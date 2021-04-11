            <!-- Sidebar -->
            <div class="col-md-4">
                <div class="sidebar">
                        <div class="categories widget">
                            <h3 class="widget-head">Sectores</h3>
                            <ul>
                                <?php foreach ($sectors as $sector){

                                    // if($filtro->)
                                    @$sectorsAll .= sprintf('<li><a href="#@" class="sector" data-id="%d">%s</a><span class="badge">%s</span></li>',$sector->id, $sector->nombre, $sector->count);
                                }

                                echo $sectorsAll;
                                ?>
                            </ul>
                        </div>
                        
                        <div class="recent-post widget">
                            <h3>Etiquetas</h3>
                            
                            <ul>
                                <?php foreach ($tags as $tag){
                                    @$tagsAll .= sprintf('<li><a href="#@" class="tag" data-id="%d">%s</a></li>',$tag->id, $tag->nombre);
                                }

                                echo $tagsAll;

                                ?>
                            </ul>
                            
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
</section>  