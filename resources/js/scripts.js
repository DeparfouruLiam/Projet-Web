/*
    Assign js kanban to html element with id kanban-canvas
*/
var kanban = new jKanban({
    element: '#kanban-canvas',
    boards: [],
    gutter: '16px',
    dragItems: true,
    dragBoards: true
});

try {document.getElementById("AddKanban").onclick = function() {ColumnAdd("column_1",document.getElementById("NewColumn").value)};}
catch{}


/*
    When showkanban page is loaded, search for database for corresponding retros, columns and content
    Insert said data in kanban var
*/
document.addEventListener('DOMContentLoaded', () => {
    fetch(window.allajax)
        .then(res => res.json())
        .then(retrosData => {
            retrosData.columns.forEach((item,index) => {
                ColumnAdd(retrosData.columns[index].id,retrosData.columns[index].title)
                console.log(retrosData.columns[index])
                console.log(retrosData.columns[index].id)
                retrosData.columns[index].items.forEach((itemContent,indexContent) => {
                    console.log(indexContent)
                    KanbanAdd(retrosData.columns[index].id,retrosData.columns[index].items[indexContent].id,retrosData.columns[index].items[indexContent].text)
                })
            })
        })
});
/*
    Add a new column to the kanban with a given title ColumnTitle
 */
function ColumnAdd (ColumnID,ColumnTitle){
    kanban.addBoards([{
    "id": ColumnID,
    "title": ColumnTitle,
    "item": []
}])}

/*
    Add a new element to the ColumnID column with a given text
 */
function KanbanAdd(ColumnID,ContentID,Text){ kanban.addElement(ColumnID,{
    "id": ContentID,
    "title": Text
})}

