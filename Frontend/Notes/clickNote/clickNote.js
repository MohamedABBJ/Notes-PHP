let editTask = () =>{
    location.href = "../../../Backend/Components/Notes/editNote.php"
}
let deleteTask = () =>{
    deleteTaskOption = window.confirm("Are you sure that you want to delete this task?");
    if(deleteTaskOption){
        location.href = "../../../Backend/Components/Notes/deleteNote.php"
    }
}
btnClickHome = () =>{
    location.href = "../../../Backend/index.php";
  };