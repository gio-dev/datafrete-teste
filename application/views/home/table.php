<?php ?>
<article class="results">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <table id="calculos" class="table table-striped table-bordered dt-responsive nowrap w-100">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Origem</th>
                        <th>Destino</th>
                        <th>Distância</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($arrCalculos as $objCalculos): /** @var $objCalculos CalculoDistancias */ ?>
                        <tr>
                            <td><?php echo $objCalculos->getId() ?></td>
                            <td><?php echo $objCalculos->getCepOrigem() ?></td>
                            <td><?php echo $objCalculos->getCepDestino() ?></td>
                            <td><?php echo $objCalculos->getDistanciaCalculada().' KM' ?></td>
                            <td class="text-center">
                                <a href="<?php echo base_url().'cadastro/'.$objCalculos->getId() ?>"
                                   class="d-inline-block mr-1">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="<?php echo base_url().'excluir/'.$objCalculos->getId() ?>"
                                   onclick="return confirm('Deseja realmente deletar esse registro?')" class="d-inline-block">
                                    <i class="fas fa-trash-alt"></i>
                                </a>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</article>

<script>
    $(document).ready( function () {
        $('#calculos').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.21/i18n/Portuguese-Brasil.json"
            }
        });
    } );
</script>