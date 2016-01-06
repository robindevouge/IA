/*
à intégrer :
	filtre insultes
	filtre à phrases
	
*/

$(document).ready(function(){
	
	var userInput = document.getElementById("userInput"),
		userWord,
		userWordL, // lowercase storage because i want to ignore case when comparing to dictionary
		newAnswer,
		doesWordExists,
		inputMode = "word", //default input mode
		dictionary = [],
		abortKeywords = ["annuler", "annule", "stop", "retour", "rien"];

	function getDictionary() {
		console.log("fuck");
		$.getJSON("_assets/getDictionary.php", function (data) {
			dictionary = data;
			console.log(dictionary);
		});
		console.log(dictionary)
	};

	//userSay and cpuSay are use so often that I made functions for them
	
	function userSay(word) {
		$(".outputBox").append('<p><span class="user">User :</span> ' + word + '</p>');
		$(".outputBox").animate({
			scrollTop: $(document).height()
		}, "slow");
	};

	function cpuSay(answer) {
		$(".outputBox").append('<p><span class="cpu">CPU :</span> ' + answer + '</p>');
		$(".outputBox").animate({
			scrollTop: $(document).height()
		}, "slow");
	};

	function clearInput() {
		userInput.value = "";
	};
	
	// getInput is the first step, it checks the "mode" the user is in and reacts properly
	// I use modes so it is really easy to add a new function as an independant mode, and each of them can be easily disabled without interrupting other mode's functioning
	// some words in the "default" mode can switch the mode
	// each mode has its own deactivation words and its own logic (e.g. the "new word" mode expects the answer to the unknown word instead of a word to test in the dictionary)

	function getInput() {
		$("input").focus();
		$("#userInput").on("keydown", function (event) {
			if (event.keyCode == 13) {
				switch (inputMode) {
					case "word":
						modeWord();
						break;
					case "new":
						modeNew();
						break;
					case "calc":
						modeMath();
						break;
					default:
						console.log("Fatal error");
				}
				clearInput();
			}
		});
	};
	
	// this is the default mode

	function modeWord() {
		switch (userInput.value) {
			case "":
				cpuSay("Si tu n'écris rien ça ne marche pas !");
				break;
			case "math":
				userSay(userInput.value);
				cpuSay("J'entre en mode calculatrice.");
				clearInput();
				inputMode = "calc";
				break;
			default:
				userWord = userInput.value;
				userWordL = userWord.toLowerCase();
				userSay(userWord);
				clearInput();
				testIfWordExists();
		}
	};
	
	// this is the mode that can add new words

	function modeNew() {
		switch (userInput.value) {
			case "":
				cpuSay("Si tu n'écris rien ça ne marche pas !");
				break;
			case "annuler":
			case "annule":
			case "stop":
			case "retour":
			case "rien":
				userSay(userInput.value);
				clearInput();
				cpuSay("D'accord, je n'enregistre pas ce mot !");
				cpuSay("Dis quelque chose !");
				inputMode = "word";
				break;
			default:
				newAnswer = userInput.value;
				userSay(newAnswer);
				clearInput();
				cpuSay('Maintenant je répondrai "' + newAnswer + '" ! Merci !');
				addToDictionary();
		}
	};
	
	// this it the math mode
	// math mode uses a jQuery plugin : math.js
	// originally i used the 'eval()' method, but it was somewhat dangerous
	// eval can parse more than math expressions, like javascript, so if the user knows it it has a risk of script injection - not good !
	// i couldn't write my own math parser
	// so i used the plugin

	function modeMath() {
		switch (userInput.value) {
			case "":
				cpuSay("Si tu n'écris rien ça ne marche pas !");
				break;
			case "annuler":
			case "annule":
			case "stop":
			case "retour":
			case "rien":
			case "normal":
			case "word":
				userSay(userInput.value);
				clearInput();
				cpuSay("Je reviens en mode normal.");
				cpuSay("Dis quelque chose !");
				inputMode = "word";
				break;
			default:
				var mathExp = userInput.value,
					result = math.eval(mathExp);
				clearInput();
				if (! result) {
					cpuSay("Ce n'est pas une expression mathématique !");
					break;
				}
				userSay(mathExp)
				cpuSay("= " + result);
		}
	};
	
	// this function compares the typed word with those from the dictionary
	// if it is an unknown word, engaging "new word" mode

	function testIfWordExists() {
		for (i = 0; i < dictionary.length; i++) {
			doesWordExists = false;
			if (dictionary[i].word == userWordL) {
				doesWordExists = true;
				cpuSay(dictionary[i].answer);
				break;
			}
		}
		if (doesWordExists == false) {
			cpuSay('Je ne connais pas ce mot. Que devrais-je répondre à "' + userWord + '" ?');
			inputMode = "new";
		}
	};

	function addToDictionary() {
		$.post('_assets/addToDictionary.php', {word: userWordL, answer: newAnswer}, function(){
			getDictionary();
		});

		inputMode = "word";
	}



// Start of program
	getDictionary();
	cpuSay("Hello ! Dis quelque chose !");
	getInput();	
	
});