let editNote = () =>{
    location.href = "../../../Backend/Components/Notes/editNote.php"
}
let deleteNote = () =>{
    deleteTaskOption = window.confirm("Are you sure that you want to delete this note?");
    if(deleteTaskOption){
        location.href = "../../../Backend/Components/Notes/deleteNote.php"
    }
}
btnClickHome = () =>{
    location.href = "../../../Backend/index.php";
};