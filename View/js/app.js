$(".startgame").on("click", function () {
  if ($(".startgame").html() == "Arreter le jeu") {
    $.ajax({
      url: "Model/php/calcul.php",
      type: 'POST',
      data: 'result=stop',
      success: function (html) {
        if (html) {
          $("#resultgame").html(html);
          $("#answer").hide();
          $(".paramgame").show();
          $(".startgame").html("Recommencer le jeu");
        }
      }
    });
  } else {
    var niveau = $("input[name=niveau]:checked").val();
    var op = $("input[name=op]:checked").val();
    $.ajax({
      url: "Model/php/calcul.php",
      type: 'POST',
      data: 'result=go&&niveau=' + niveau + "&&op=" + op,
      success: function (html) {
        if (html) {
          $("#resultgame").html(html);
          $("#answer").show();
          $(".paramgame").hide();
          $(".startgame").html("Arreter le jeu");
          getanswers();
        }
      }
    });
  }
});

function sendanswer(elt) {
  var result = (typeof(elt) == "object") ? $("#number").val() : elt;
  $.ajax({
    url: "Model/php/calcul.php",
    type: 'POST',
    data: 'result=' + result,
    success: function (html) {
      if (html) {
        $("#resultgame").html(html);
        if (html.length < 24) {
          $("#number").val("");
          $("#number").focus();
          getanswers();
        } else {
          $("#number").val("");
          $("#answer").hide();
          $(".paramgame").show();
          $(".startgame").html("Recommencer le jeu");
        }
      }
    }
  });
}

function getanswers() {
  $.ajax({
    url: "Model/php/calcul.php",
    type: 'POST',
    data: 'answers=get',
    success: function (html) {
      if (html != "FALSE") {
        $("#answer").html(html);
      }
    }
  });
}

$(".scriptform").on("submit", function () {
  event.preventDefault();
  $("#resultat").hide();
  $("#erreur").hide();
  $.ajax({
    // url: $(this).attr("action"),
    dataType: "json",
    url: 'index.php?action=api',
    type: 'POST',
    data: $(this).serialize(),
    success: function (response) {
      if (response && response.reponse) {
        $("#resultat").html(response.reponse);
        $("#resultat").show();
        $("body").scrollTop(440);
      }
      if (response && response.erreur) {
        $("#erreur").html(response.erreur);
        $("#erreur").show();
        $("body").scrollTop(440);
      }
    }
  });
});

function addchmp() {
  var last = document.getElementById('listchmp').lastElementChild.id;
  var numero = parseInt(last) + 1;
  if (numero < 21) {
    var newchmp = document.createElement('p');
    var inputone = document.createElement('input');
    var select = document.createElement('select');
    var checkbox = document.createElement('input');
    newchmp.id = numero;
    inputone.type = 'text';
    inputone.name = 'param' + numero + '_name';
    checkbox.type = 'checkbox';
    checkbox.name = 'param' + numero + '_ob';
    checkbox.id = 'param' + numero + '_ob';
    select.name = 'param' + numero + '_type';
    select.innerHTML = '<option value="name">Nom, Objet, etc</option><option value="email">Courriel</option><option value="number">Nombre</option><option value="message">Message</option>';
    newchmp.innerHTML = 'Nom du Champ : ';
    newchmp.appendChild(inputone);
    newchmp.innerHTML += ' Type du Champ : ';
    newchmp.appendChild(select);
    newchmp.appendChild(checkbox);
    document.getElementById('listchmp').appendChild(newchmp);
  }

}

function removechmp() {
  var last = document.getElementById('listchmp').lastElementChild.id;
  var numero = parseInt(last);
  if (numero > 3) {
    var lastchmp = document.getElementById('listchmp').lastElementChild;
    document.getElementById('listchmp').removeChild(lastchmp);
  }
}

// Accordeon
var acc = $(".accordeon");
var i;

for (i=0;i<acc.length;i++) {
  acc[i].addEventListener("click",function () {
    if ($(this).hasClass('active')) {
      $(".accordeon").removeClass('active');
    } else {
      $(".accordeon").removeClass('active');
      $(this).addClass('active');
    }
  });
}
