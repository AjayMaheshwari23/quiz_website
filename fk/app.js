console.log("Welcome to questions app. This is app.js");
showquestions();

// If user adds a Question, add it to the localStorage
let addBtn = document.getElementById("addBtn");
addBtn.addEventListener("click", function (e) {
  let addTxt = document.getElementById("addTxt");
  let questions = localStorage.getItem("questions");
  if (questions == null) {
    questionsObj = [];
  } else {
    questionsObj = JSON.parse(questions);
  }
  questionsObj.push(addTxt.value);
  localStorage.setItem("questions", JSON.stringify(questionsObj));
  addTxt.value = "";
  showquestions();
});

// Function to show elements from localStorage
function showquestions() {
  let questions = localStorage.getItem("questions");
  if (questions == null) {
    questionsObj = [];
  } else {
    questionsObj = JSON.parse(questions);
  }
  let html = "";
  questionsObj.forEach(function (element, index) {
    html += `
            <div class="QuestionCard my-2 mx-2 card" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Question ${index + 1}</h5>
                        <p class="card-text"> ${element}</p>
                        <button id="${index}"onclick="deleteQuestion(this.id)" class="btn btn-primary">Delete Question</button>
                    </div>
                </div>`;
  });
  let questionsElm = document.getElementById("questions");
  if (questionsObj.length != 0) {
    questionsElm.innerHTML = html;
  } else {
    questionsElm.innerHTML = `Nothing to show! Use "Add a Question" section above to add questions.`;
  }
}

// Function to delete a Question
function deleteQuestion(index) {
  //   console.log("I am deleting", index);

  let questions = localStorage.getItem("questions");
  if (questions == null) {
    questionsObj = [];
  } else {
    questionsObj = JSON.parse(questions);
  }

  questionsObj.splice(index, 1);
  localStorage.setItem("questions", JSON.stringify(questionsObj));
  showquestions();
}


let search = document.getElementById('searchTxt');
search.addEventListener("input", function () {

  let inputVal = search.value.toLowerCase();
  // console.log('Input event fired!', inputVal);
  let QuestionCards = document.getElementsByClassName('QuestionCard');
  Array.from(QuestionCards).forEach(function (element) {
    let cardTxt = element.getElementsByTagName("p")[0].innerText;
    if (cardTxt.includes(inputVal)) {
      element.style.display = "block";
    } else {
      element.style.display = "none";
    }
    // console.log(cardTxt);
  })
})