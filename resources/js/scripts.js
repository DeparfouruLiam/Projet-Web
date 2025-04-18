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

document.getElementById("AddKanban").onclick = function() {ColumnAdd("column_1",document.getElementById("NewColumn").value)};
document.getElementById("RemoveKanban").onclick = function() {KanbanRemove()};

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
                    KanbanAddForm(retrosData.columns[index].id,document.createElement("form"))
            })
        })
});
function ColumnAdd (ColumnID,ColumnTitle){kanban.addBoards([{
    "id": ColumnID,
    "title": ColumnTitle,
    "item": []
}])}
function KanbanAdd(ColumnID,ContentID,Text){ kanban.addElement(ColumnID,{
    "id": ContentID,
    "title": Text
})}

function KanbanAddForm(ColumnID,form){ kanban.addForm(ColumnID,form)}
function KanbanRemove(){ kanban.removeElement('item-id-6'); }
