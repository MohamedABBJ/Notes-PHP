let noteTitle, noteDescription;
i = 0;

btnClickLogIn = () => {
  location.href = "./Components/Login/login.html";
};
btnClickLogOut = () => {
  location.href = "./Components/Logout/logout.php";
};
btnClickNote = () => {
  location.href = "./Components/php/clickNote.php";
};




/* NOT NEEDED ANYMORE
let btnClickAddNote = () => {
  i++;
  noteTitle = document.getElementById("noteTitle").value;
  noteDescription = document.getElementById("noteDescription").value;

  createNote = document.createElement("button");
  createNote.setAttribute("id", "createNoteStyle" + i);
  createNote.setAttribute("onclick", "btnClickNote()");
  createNote.style.height = "100px";
  createNote.style.width = "80%";
  createNote.style.fontSize = "20px";
  createNote.style.display = "flex";
  createNote.style.flexWrap = "wrap";
  createNote.style.marginTop = "20px";
  document.getElementById("notes").appendChild(createNote);

  titleDiv = document.createElement("div");
  titleDiv.innerHTML = noteTitle;
  titleDiv.setAttribute("id", "titleDivs");
  titleDiv.style.color = "blue";
  titleDiv.style.position = "relative";
  titleDiv.style.top = "30%";
  titleDiv.style.left = "5%";
  document.getElementById("createNoteStyle" + i).appendChild(titleDiv);

  descriptionDiv = document.createElement("div");
  descriptionDiv.innerHTML = noteDescription;
  descriptionDiv.style.color = "red";
  descriptionDiv.setAttribute("id", "descriptionDiv");
  descriptionDiv.style.position = "relative";
  descriptionDiv.style.top = "30%";
  descriptionDiv.style.left = "20%";
  document.getElementById("createNoteStyle" + i).appendChild(descriptionDiv);
};

btnCreateNote = () =>{
$.ajax({
  type: "post",
  url: "./Components/php/submitnote.php",
  data: "",
  dataType: "json",
  success: function (result) {
    console.log(result)
  }
});

}
*/
