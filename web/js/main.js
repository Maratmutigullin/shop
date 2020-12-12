"use strict";

$(document).ready(function(){

    function showCart(cart){
        $('#cart .modal-body').html(cart);
        $('#cart').modal();
    }

    //страница корзины
    let cart_link = document.querySelector('.cart-link');
    cart_link.onclick = getCart;
    function getCart(){
        $.ajax({
            url: '/web/cart/show',
            type: 'GET',
            success: function (res){
                if(!res) alert("Ошибка");
                showCart(res);
            },
            error: function () {
                alert('Error');
            }
        });
    }

    // Очистка отдельного элемента корзины
$('#cart .modal-body').on('click', '.del-item', function(){
    let id = $(this).data('id');
    $.ajax({
        url: '/web/cart/del-item',
        data: {id : id},
        type: 'GET',
        success: function (res){
            if(!res) alert("Ошибка");
            showCart(res);
        },
        error: function () {
            alert('Error');
        }
    });
});
    // Очистка корзины

    let del = document.querySelector('.del');
    del.onclick = clearCart;
    function clearCart(){
        $.ajax({
            url: '/web/cart/clear',
            type: 'GET',
            success: function (res){
                if(!res) alert("Ошибка");
                showCart(res);
            },
            error: function () {
                alert('Error');
            }
        });
    }

//Формирование корзины при клике на кнопку КУПИТЬ
    $('.cart-js').on('click', function(e){
        e.preventDefault();
        let id = $(this).data('id');
        $.ajax({
            url: '/web/cart/add',
            data: {id: id},
            type: 'GET',
            success: function (res){
                // console.log(res);
                showCart(res);
            },
            error: function () {
                alert('Error');
            }
        });
    });
});

