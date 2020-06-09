//função que valida a desativação do form
function disableFormOnSubmit(){

  $('form.form-disabled-on-load').submit(function(){
    loadOnDisabledElement($(this).find('[type="submit"]'));
  });

  $('a.form-disabled-on-load,.btn-spinner').click(function(){
    loadOnDisabledElement(this);

    $(this).parents('form:first').submit();
  });
}

//função que desabilita e adiciona o SVG no button ou link do form submit
function loadOnDisabledElement(element){
  $(element)
      .attr('disabled', true);

  if ($(element).find('.fa-spinner').length == 0) {
    $(element).prepend(iconLoading());
  }
}

//icone svg do button ou link do submit
function iconLoading() {
  return '<i class="fa fa-spin fa-spinner"></i> ';
}

// Remove o svg do button ou link do submit
function removeLoaderFromElement(element) {
  $(element).each(function(i, el) {
    if ($(el).is('form')) {
      $(el).find('[type="submit"]').find('.fa-spinner').remove();
      $(el).find('[type="submit"]').removeAttr('disabled');
    } else {
      $(element).find('.fa-spinner').remove();
      $(element).removeAttr('disabled');
    }
  });
}



(function(){
  disableFormOnSubmit();
  removeLoaderFromElement('.form-disabled-on-load');

  $('.cep-mask').mask('00000-000');
  $('.cep-mask').on('blur', function (e) {
      var element = $(this);
      var cep = element.val().replace(/\D/g, '');
      btnsaveDisable();
      $('.row-distancia').hide(200);
      $('input[name=DISTANCIA_CALCULADA]').val('');
      if(cep.length == 8) {
        $.ajax({
          url: window.base_url + "home/cepvalid",
          type: "get",
          data:{cep:cep},
          success: function (response) {
            var data = jQuery.parseJSON(response);
            if (data.status == 'error') {
              alert('CEP inválido');
              element.val('');
              cepsVerify(element, false, 0,0);
            } else {
              cepsVerify(element, true, data.lat, data.long);
            }

          },
          error: function (jqXHR, textStatus, errorThrown) {
            cepsVerify(element, false, 0,0);
            element.val('');
          },
          always: function () {}
        });
      } else {
        cepsVerify(element, false, 0,0);
        element.val('');
      }
    });

})();

function btnsaveenable() {
  $('.btn-salvar').prop('disabled', false);
  $('.btn-salvar').removeClass('disabled');
}

function btnsaveDisable() {
  $('.btn-salvar').prop('disabled', true);
  $('.btn-salvar').addClass('disabled');
}

function cepsVerify(element, value, lat, long) {
  if(element.attr('name') == 'CEP_ORIGEM'){
    cepOrigem = value;
    latOrigem = lat;
    longOrigem = long;
    $('input[name=LAT_ORIGEM]').val(lat);
    $('input[name=LONG_ORIGEM]').val(long);
  } else if (element.attr('name') == 'CEP_DESTINO'){
    cepDestino = value;
    latDestino = lat;
    longDestino = long;
    $('input[name=LAT_DESTINO]').val(lat);
    $('input[name=LONG_DESTINO]').val(long);
  }
  verifyDistance();
}

function verifyDistance(){
  if(cepDestino && cepOrigem){
    btnsaveDisable()
    $.ajax({
      url: window.base_url + "home/checkdistance",
      type: "get",
      data:{cepO:$('input[name=CEP_ORIGEM]').val(),cepD:$('input[name=CEP_DESTINO]').val(),latO:latOrigem,longO:longOrigem,latD:latDestino,longD:longDestino},
      success: function (response) {
        var data = jQuery.parseJSON(response);
        if (data.status == 'error') {
          alert('Não foi possível calcular a distância entre os CEPs, tente com outro CEP');
          $('.row-distancia').hide(200);
          $('input[name=DISTANCIA_CALCULADA]').val('');
        } else {
          alert('Distância calculada com sucesso!');
          $('p.distancia span.dt-valor').html(data.distance_km+' KM');
          $('input[name=DISTANCIA_CALCULADA]').val(data.distance_km)
          $('.row-distancia').show(200);
          btnsaveenable()
        }

      },
      error: function (jqXHR, textStatus, errorThrown) {

      },
      always: function () {}
    });
  }
}