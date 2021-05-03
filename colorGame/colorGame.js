var numSquares = 6;
var colors = [] //Originially generateRandomColors(numSquares);
var pickedColor; //Originially  = pickColor()
var squares = document.querySelectorAll(".square");

var colorDisplay = document.getElementById("colorDisplay");
var messageDisplay = document.getElementById("message");
var resetButton = document.getElementById("reset");
var h1 = document.querySelector("h1");
var easyBtn = document.getElementById("easyBtn");
var hardBtn = document.getElementById("hardBtn");
var modeBtn = document.getElementsByClassName("mode")

init();

function init() {
modeInit();
squareInit();
}

function modeInit() {
    //mode buttons
    for (var i = 0; i < modeBtn.length; i++) {
        modeBtn[i].addEventListener("click", function () {
            modeBtn[0].classList.remove("selected");
            modeBtn[1].classList.remove("selected");
            this.classList.add("selected");

            //How many squares to show
            this.textContent === "Easy" ? numSquares = 3 : numSquares = 6; //Equivalent to below
            // if (this.textContent === "Easy") {
            //     numSquares = 3;
            // } else {
            //     numSquares = 6;
            // }

            reset();
        })
    }
}

function squareInit(){
    //squares
    for (var i = 0; i < squares.length; i++) {
        //Initial Colors
        squares[i].style.backgroundColor = colors[i];

        //Click listeners
        squares[i].addEventListener("click", function () {
            if (this.style.backgroundColor === pickedColor) {
                messageDisplay.textContent = "You got it!";
                changeColors(pickedColor);
                h1.style.backgroundColor = pickedColor;
                resetButton.textContent = "Play Again?";
            } else {
                this.style.backgroundColor = "#232323";
                messageDisplay.textContent = "Try again";
            };
        })
    }
    reset();
}

function reset() {
    messageDisplay.textContent = "";
    resetButton.textContent = "New Colours";
    colors = generateRandomColors(numSquares);
    pickedColor = pickColor();
    colorDisplay.textContent = pickedColor;
    for (var i = 0; i < squares.length; i++) {
        if (colors[i]) {
            squares[i].style.display = "block";
            squares[i].style.backgroundColor = colors[i];
        } else {
            squares[i].style.display = "none";
        }
    }
    h1.style.backgroundColor = "#759fd6";
}

resetButton.addEventListener("click", function () {
    reset();
})


function changeColors(color) {
    for (var i = 0; i < squares.length; i++) {
        squares[i].style.backgroundColor = color;
    }
}
function pickColor() {
    //pick Number
    var random = Math.floor(Math.random() * colors.length);
    return colors[random];
}

function generateRandomColors(num) {
    var arr = [];
    for (var i = 0; i < num; i++) {
        //get random color and push to array
        arr.push(randomColor())
    }
    return arr
}

function randomColor() {
    //Pick random number from 0-255 for each RGB
    var r = Math.floor(Math.random() * 256);
    var g = Math.floor(Math.random() * 256);
    var b = Math.floor(Math.random() * 256);

    return "rgb(" + r + ", " + g + ", " + b + ")";
}