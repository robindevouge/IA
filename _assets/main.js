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
		abortKeywords = ["annuler", "annule", "stop", "retour", "rien"]
		newEntry = [];

	function getDictionary() {
		$.getJSON("_assets/dictionary.json", function (dict) {
			dictionary = dict;
		});
	};

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
		newEntry = {word: userWordL, answer: newAnswer};
		dictionary.push(newEntry);

		// waiting for a way to send updated dictionary to server

		inputMode = "word";
	}



// Start of program
	getDictionary();
	cpuSay("Hello ! Dis quelque chose !");
	getInput();	
	
});