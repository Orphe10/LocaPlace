
var majuscule = document.getElementById('maj');
var special = document.getElementById('special');
var chiffre = document.getElementById('chiffre');
var message = document.getElementById('mot_de_passe')

$("document").ready(function(){
    $("#mot_de_passe").on({
        keyup : function(){
            var upperCaseLetters = /[A-Z]/g;
            var chiffer = /[0-9]/g;
            var char_special0 = /["-/]/g;
            var char_special1 = /[:-@]/g;
            var char_special2 = /[\[-`]/g;
            var char_special3 = /[{-~]/g;
            if(message.value.match(upperCaseLetters)){
                majuscule.classList.remove('obligation');
                majuscule.classList.add('obligation_valide');
            }else{
                majuscule.classList.add('obligation');
                majuscule.classList.remove('obligation_valide');
            }
            if(message.value.match(chiffer)){
                chiffre.classList.remove('obligation');
                chiffre.classList.add('obligation_valide');
            }else{
                chiffre.classList.add('obligation');
                chiffre.classList.remove('obligation_valide');
            }
            if(message.value.match(char_special0) || message.value.match(char_special1) || message.value.match(char_special2) || message.value.match(char_special3)){
                special.classList.remove('obligation');
                special.classList.add('obligation_valide');
            }else{
                special.classList.add('obligation');
                special.classList.remove('obligation_valide');
            }
            
        }
    })
    $("#mot_de_passe").on({
        focus : function(){
            $("#message").css('display','block');
        },
        blur : function(){
            $("#message").css('display', 'none');
        }
    })
    $("#mot_de_passe0").keyup(function(){
        if($('#mot_de_passe0').val() != $('#mot_de_passe').val()){
            $('div.form-group').addClass("has-error");
            $('div.alert').show("slow").delay(4000).hide('slow');
            $('#validation').replaceWith('<label id="validation" style="font-weight:normal;color:black;">Valider mon inscription</label>');
        }
    })   
})