$(document).ready(main);

function main() {

    $('.know-more').click(showInfo);

    $('.addUser').click(showMsg);

};

function showInfo() {
    $('#myModal .modal-body').empty();
    $image = $(this).closest('.row').find('.thumbnail').clone(false, false);
    $text = $(this).closest('.row').find('h6').clone(false, false);
    $('#myModal').modal('show');
    $('#myModal .modal-body').append($image);
    $('#myModal .modal-body').append($text);
};

function showMsg() {
    $('#modalMsg').modal('show');
}

