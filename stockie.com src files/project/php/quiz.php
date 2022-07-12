<?php
include("connection.php");
$sql = 	"Select * from quiz";
$result = mysqli_query($conn, $sql);
$totalrows = mysqli_num_rows($result);

?>

<!DOCTYPE html>
<html>
<head>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
	<title>QUIZ</title>
	<style>
	.square1 {
  height: 300px;
  width: 1450px;
  background-color: rgba(103,58,183,255);
	}

	.square2 {
  height: 2000px;
  width: 1000px;
  
  border-radius: 25px;
  box-shadow: 9px 9px;

  background-color: white;
	}	


.question{
	font-weight: 600;
}
.answers {
  margin-bottom: 20px;
}
.answers label{
  display: block;
}
#submit{
	font-family: sans-serif;
	font-size: 20px;
	background-color: rgba(103,58,183,255);
	color: #fff;
	border: 0px;
	border-radius: 3px;
	padding: 20px;
	cursor: pointer;
	margin-bottom: 20px;
}
#submit:hover{
	background-color: #38a;
}


</style>
</head>
<body style="background-color: rgba(240,235,248,255)">
<a href="homepage.php"><img src="homeicon.png" title="Home" alt="" id="icon" style=" height: 50px;width: 50px;margin: 10px;"></a>
<div class="square1"> 
<br><br><br><br><br><br>
<p style="font-family: 'Press Start 2P', cursive; font-size: 90px; padding-top: 25px;">TEST YOUR SKILLS</p>
</div>
<br><br><br><br><br><br>
<center>

<button style="font-family: sans-serif;
	font-size: 20px;
	background-color: rgba(103,58,183,255);
	color: #fff;
	border: 0px;
	border-radius: 3px;
	padding: 20px;
	cursor: pointer;
	margin-bottom: 20px;" onclick="myFunction()">PRESS ME BEFORE U START</button>


<div  class="square2"> 
<br><br>
<div  style="font-size: 20px;text-align: left; padding-left: 30px;" id="quiz"></div>
<button id="submit">Submit Quiz</button>
<div id="results"></div>
</center>

</div>


<script type="text/javascript">
	(function(){
  function buildQuiz(){
    // variable to store the HTML output
    const output = [];

    // for each question...
    myQuestions.forEach(
      (currentQuestion, questionNumber) => {

        // variable to store the list of possible answers
        const answers = [];

        // and for each available answer...
        for(letter in currentQuestion.answers){

          // ...add an HTML radio button
          answers.push(
            `<label>
              <input type="radio" name="question${questionNumber}" value="${letter}">
              ${letter} :
              ${currentQuestion.answers[letter]}
            </label>`
          );
        }

        // add this question and its answers to the output
        output.push(
          `<div class="question"> ${currentQuestion.question} </div>
          <div class="answers"> ${answers.join('')} </div>`
        );
      }
    );

    // finally combine our output list into one string of HTML and put it on the page
    quizContainer.innerHTML = output.join('');
  }

  function showResults(){

    // gather answer containers from our quiz
    const answerContainers = quizContainer.querySelectorAll('.answers');

    // keep track of user's answers
    let numCorrect = 0;

    // for each question...
    myQuestions.forEach( (currentQuestion, questionNumber) => {

      // find selected answer
      const answerContainer = answerContainers[questionNumber];
      const selector = `input[name=question${questionNumber}]:checked`;
      const userAnswer = (answerContainer.querySelector(selector) || {}).value;

      // if answer is correct
      if(userAnswer === currentQuestion.correctAnswer){
        // add to the number of correct answers
        numCorrect++;

        // color the answers green
        answerContainers[questionNumber].style.color = 'blue';
      }
      // if answer is wrong or blank
      else{
        // color the answers red
        answerContainers[questionNumber].style.color = 'red';
      }
    });

    // show number of correct answers out of total
    resultsContainer.innerHTML = `${numCorrect} out of ${myQuestions.length}`;
  }
 
  const quizContainer = document.getElementById('quiz');
  const resultsContainer = document.getElementById('results');
  const submitButton = document.getElementById('submit');
  const myQuestions = [
    <?php
  if ($totalrows >=1){
    while($row = mysqli_fetch_assoc($result)) {
      ?>
     {
      question: "<?php echo $row['question'];?>",
      answers: {
        a: "<?php echo $row['a'];?>",
        b: "<?php echo $row['b'];?>",
        c: "<?php echo $row['c'];?>",
        d: "<?php echo $row['d'];?>"
      },
      correctAnswer: "<?php echo $row['answer'];?>"
    },
    <?php }}?>
  ];


  // Kick things off
  buildQuiz();

  // Event listeners
  submitButton.addEventListener('click', showResults);
})();
</script>

<script>
var myVar;

function myFunction() {
  myVar = setTimeout(function(){ alert("Hello"); }, 900000);
}

function myStopFunction() {
  clearTimeout(myVar);
}
</script>


</body>
</html>