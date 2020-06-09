<?php


/** @var $objCalculo CalculoDistancias */
?>

<script>
    var cepOrigem = <?php echo $objCalculo->isNew() ? false : true; ?>;
    var latOrigem = <?php echo $objCalculo->isNew() ? '' : $objCalculo->getLatOrigem(); ?>;
    var longOrigem = <?php echo $objCalculo->isNew() ? '' : $objCalculo->getLongOrigem(); ?>;
    var cepDestino = <?php echo $objCalculo->isNew() ? false : true; ?>;
    var latDestino = <?php echo $objCalculo->isNew() ? '' : $objCalculo->getLatDestino(); ?>;
    var longDestino = <?php echo $objCalculo->isNew() ? '' : $objCalculo->getLongDestino(); ?>;
</script>
<article class="form-cadastro">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form class="form" action="" id="form-cadastro" method="post">
                    <input type="hidden" name="ID" value="<?php echo $objCalculo->getId(); ?>">
                    <input type="hidden" name="LAT_ORIGEM" value="<?php echo $objCalculo->getLatOrigem(); ?>">
                    <input type="hidden" name="LAT_DESTINO" value="<?php echo $objCalculo->getLatDestino(); ?>">
                    <input type="hidden" name="LONG_ORIGEM" value="<?php echo $objCalculo->getLongOrigem(); ?>">
                    <input type="hidden" name="LONG_DESTINO" value="<?php echo $objCalculo->getLongDestino(); ?>">
                    <input type="hidden" name="DISTANCIA_CALCULADA" value="<?php echo $objCalculo->getLongDestino(); ?>">

                    <div class="form-row">
                        <div class="form-group col-12 col-md-6">
                            <label for="">CEP Origem</label>
                            <input type="text" class="form-control input-form cep-mask" required name="CEP_ORIGEM" id="CEP_ORIGEM"
                                   value="<?php echo $objCalculo->getCepOrigem(); ?>">
                        </div>
                        <div class="form-group col-12 col-md-6">
                            <label for="CEP_DESTINO">CEP Destino</label>
                            <input type="text" class="form-control input-form cep-mask" required name="CEP_DESTINO" id="CEP_DESTINO"
                                   value="<?php echo $objCalculo->getCepDestino(); ?>">
                        </div>

                    </div>
                    <div class="form-row row-distancia"<?php echo $objCalculo->getDistanciaCalculada() > 0 ? '' : ' style="display:none;"' ?>>
                        <div class="form-group col-12">
                            <p class="distancia">
                                Distancia entre os Ceps é: <span class="dt-valor"><?php echo $objCalculo->getDistanciaCalculada().' KM'; ?></span>
                            </p>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-12 d-flex justify-content-center justify-content-lg-end">
                            <button type="submit" class="btn btn-success disabled btn-salvar btn-spinner" disabled="">
                                Salvar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</article>
