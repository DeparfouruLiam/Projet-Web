/*var dataContent = [
    {
        "id": "column-id-1",
        "title": "カラム (1)",
        "item": [
            {
                "id": "item-id-1",
                "title": "カード 1"
            },
            {
                "id": "item-id-2",
                "title": "カード 2"
            }
        ]
    },
    {
        "id": "column-id-2",
        "title": "カラム (2)",
        "item": [
            {
                "id": "item-id-3",
                "title": "カード 3"
            }
        ]
    },
    {
        "id": "column-id-3",
        "title": "カラム (3)",
        "item": [
            {
                "id": "item-id-4",
                "title": "カード 4"
            },
            {
                "id": "item-id-5",
                "title": "カード 5"
            }
        ]
    }
];*/

var dataContent = []

var kanban = new jKanban({
    element: '#kanban-canvas',  // カンバンを表示する場所のID
    boards: dataContent,        // カンバンに表示されるカラムやカードのデータ
    gutter: '16px',             // カンバンの余白
    widthBoard: '250px',        // カラムの幅 (responsivePercentageの「true」設定により無視される)
    responsivePercentage: true, // trueを選択時はカラム幅は％で指定され、gutterとwidthBoardの設定は不要
    dragItems: true,            // trueを選択時はカードをドラッグ可能
    dragBoards: true            // カラムをドラッグ可能にするかどうか
});

var salope ={
        "id": "item-id-6",
        "title": "Saloperie 6"
    }
;
document.getElementById("AddKanban").onclick = function() {ColumnAdd("column_1","Salope")};
document.getElementById("RemoveKanban").onclick = function() {KanbanRemove()};
document.addEventListener('DOMContentLoaded', () => {
    fetch(window.allajax)
        .then(res => res.json())
        .then(retrosData => {
            console.log(retrosData.columns[1].id)
            retrosData.columns.forEach((item,index) => {
                ColumnAdd(retrosData.columns[index].id,retrosData.columns[index].title),
                retrosData.columns.forEach((itemContent,indexContent) =>
                    KanbanAdd(retrosData.columns[index].id,retrosData.columns[index].items[indexContent].id,retrosData.columns[index].items[indexContent].text))
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
function KanbanRemove(){ kanban.removeElement('item-id-6'); }
