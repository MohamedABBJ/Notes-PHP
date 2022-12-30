/*var mysql = require('mysql')

var conection = mysql.createConnection({
    host:'localhost',
    database:'zapateria',
    user:'root',
    password:''
})

conection.connect(function(error){
    if (error) {
        throw error
    }else{
        console.log('Conexion exitosa')
    }
})

conection.query('SELECT * FROM usuarios' , function(error, results, changes) {
    if (error) {throw error;}
        results.forEach(results => {
            console.log(results)
        });
})

conection.end()*/

let btn_Click = () =>{
    noteTitle = document.getElementById('noteTitle').value
    noteDescription = document.getElementById('noteDescription').value
    
    const titleOfNote = document.createElement('h1')
    titleOfNote.setAttribute('id', titleOfNote)
    const titleContent = document.createTextNode(noteTitle)
    titleOfNote.appendChild(titleContent)

    document.body.appendChild(titleOfNote)
    
    const descriptionOfNote = document.createElement('h1')
    descriptionOfNote.setAttribute('id', descriptionOfNote)
    const descriptionContent = document.createTextNode(noteDescription)
    descriptionOfNote.appendChild(descriptionContent)

    document.body.appendChild(descriptionOfNote)
}
