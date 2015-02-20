var idUser;

function confirmDeleteUser(id,name){
    var idUser = id;
    $("#nameUser").text(name);
    $("#dialog-delete").modal('show');
}

function deleteUser(){
    location.href='user/delete?id='+idUser;
}
