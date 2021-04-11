<style>
    .item-relacionado:hover {
            color: #337ab7 !important;
            text-decoration: none !important;
    }
    .categories ul {
            max-height: 345px;
            overflow-y: auto;
            padding-right: 5px;
        }
    .categories {
        padding-right: 5px;
    }
</style>
<!--
==================================================
Global Page Section Start
================================================== -->
<section class="global-page-header">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="block">
                    <h2><?php echo strtoupper($item->titulo); ?> <a href="<?php echo base_url() ?>PanelController/edititem/<?php echo $item->id; ?>" class="btn btn-dafault btn-details pull-right">EDITAR</a></h2>
                    <div class="portfolio-meta">
                        <span><?php echo $item->nombreSector?></span>|
                        <span><?php echo FunctionsLibrary::fechaMysqlToReal($item->fecha); ?></span>|
                        <span><?php echo $item->usuarioNombre ?></span>|
                        <span> 
                            <?php foreach ($itemsTags as $i => $itemTag) {
                                echo ($i==0) ? $itemTag->nombreTag : ', '.$itemTag->nombreTag;
                             } ?>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section><!--/#Page header-->


<section class="single-post">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <!-- <div class="post-img">
                    <img class="img-responsive" alt="" src="<?php echo base_url() ?>images/blog/post-1.jpg">
                </div> -->
                <div class="post-content">
                    <?php echo $item->texto; ?>
                </div>
                
            </div>
            <!-- Sidebar -->
            <div class="col-md-4">
                <div class="sidebar">
                        <div class="categories widget">
                            <h3 class="widget-head">Relacionados</h3>
                            <ul>
                                <?php foreach ($related as $item){

                                    // if($filtro->)
                                    @$sectorsAll .= sprintf('<li><a href="%sDocumentationController/itemView/%d" class="item-relacionado">%s</a> <small> %s/%s/%s</small></li>',base_url(),$item->id, $item->titulo, $item->nombreSector, FunctionsLibrary::fechaMysqlToReal($item->fecha), $item->usuarioNombre);
                                }

                                echo isset($sectorsAll) ? $sectorsAll : '<li>No hay items relacionados</li>';
                                ?>
                            </ul>
                        </div>
                        
                        <!-- <div class="recent-post widget">
                            <h3>Etiquetas</h3>
                            
                            <ul>
                                <?php foreach ($tags as $tag){
                                    @$tagsAll .= sprintf('<li><a href="#@" class="tag" data-id="%d">%s</a></li>',$tag->id, $tag->nombre);
                                }

                                echo $tagsAll;

                                ?>
                            </ul>
                            
                        </div> -->
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>  
<script>
        hljs.initHighlightingOnLoad();
</script>