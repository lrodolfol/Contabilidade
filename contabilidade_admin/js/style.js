/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$(document).ready(function(){
    /*$('#jj').click(function (){
        window.open('index.php');
    });
    */
   $('#jj').click(function (){
        window.location.href = 'index.php?user=2337b119d2a964384244c49edeb116a0';
    });
    
    $('#login').click(function (){
        window.location.href = 'page_login.php';
    });
    
    $('#refresh').click(function (){
        //window.location.reload(); OU: 
        location.reload();
    })
    
    
    /*
        $('#autor').mouseout(function (){
        $('#autor').css('color','blue');
    });
    */
    
});

