  <style>
        article{
            border-bottom: aliceblue 2px solid;
        }
      
      .blogpost-title{
        margin-top: 5px;
        margin-bottom: 5px;
      }

      .sidebar {
        max-height: 676px !important;
      }

      .actived {
            color: #337ab7 !important;
            text-decoration: none !important;
        }

        .sector:hover {
            color: #337ab7 !important;
            text-decoration: none !important;
        }

        .global-page-header {
            z-index: 10;
            padding-bottom: 23px;
        }

        .tag-ul {
            display: flex;
            flex-wrap: wrap;
        }
        .tag, .tag-selected {
            background-color: #3c8dbc;
            border-color: #367fa9;
            padding: 1px 5px;
            color: #fff;
            list-style: none;
            border: 1px solid #aaa;
            border-radius: 4px;
            cursor: default;
            float: left;
            margin-right: 5px;
            margin-bottom: 3px;
            font-size: 14px;
            line-height: 1.42857143;
            font-family: 'Source Sans Pro','Helvetica Neue',Helvetica,Arial,sans-serif;
            font-weight: 400;
        }
        .tag:hover, .tag-remove:hover {
            cursor: pointer;
        }
        .tag-remove {
            margin-right: 3px;
        }
        .tag-ul-selected-container {
            padding:3px 5px !important;
        }
        .recent-post.widget {
            height: 315px;
        }
        .tag-search-input {
            margin-left: 4px;
            width: 96%;
            height: 25px;
        }
        .tag-select-container {
            box-sizing: border-box;
            display: inline-block;
            margin: 0;
            position: relative;
            vertical-align: middle;
        }
        .form-group-container {
            /*border: 1px #3c8dbc solid;*/
            padding-bottom: 2px;
            margin-bottom: 8px;
        }

        .categories ul {
            max-height: 245px;
            overflow-y: auto;
            padding-right: 5px;
        }
        .categories {
            padding-right: 5px;
        }

        .recent-post ul {
            max-height: 200px;
            overflow-y: auto;
            padding-right: 5px;
        }
        .recent-post {
            padding-right: 5px;
        }
        .nofilter-container .fa-2x {
            font-size: 1.5em;
        }
        .nofilter-container {
            margin-top: 12px;
            padding-left: 0;
            height: 42px;
        }
        .nofilter-container .fa-stack-1x {
            color: white;
        }

  </style>  
  <!-- ================================================== 
            Global Page Section Start
        ================================================== -->
        <section class="global-page-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="search widget">
                            <form action="" method="get" class="searchform" role="search">
                                <div class="input-group">
                                    <input type="text" id="item-search" class="form-control" placeholder="Buscar por titulo...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button"> <i class="ion-search"></i> </button>
                                    </span>
                                </div><!-- /input-group -->
                            </form>
                        </div>
                    </div>
                    <div class="col-md-2 nofilter-container">
                        <a href="<?php echo base_url() ?>DocumentationController/" title="Reset filtro" style="display: none;">
                            <span class="fa-stack fa-2x">
                              <i class="fa fa-filter fa-stack-1x"></i>
                              <i class="fa fa-ban fa-stack-2x" style="color:#dd4b39"></i>
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </section>

<!--=============================================
=            Blog With Right Sidebar            =
==============================================-->
<section id="blog-full-width">
    <div class="container">
        <div class="row">
            <div class="col-md-8" id="list-item-container">
                <?php foreach ($items as $item){ ?>
                    <article class="wow fadeInDown" data-wow-delay=".3s" data-wow-duration="500ms" data-title="<?php echo $item->titulo; ?>">
                        <div class="blog-content">
                            <h3 class="blogpost-title">
                            <a href="<?php echo base_url() ?>DocumentationController/itemView/<?php echo $item->id; ?>"><?php echo $item->titulo; ?></a>
                            </h3>
                            <div class="blog-meta">
                                <span><?php echo $item->nombreSector?></span>
                                <span><?php echo FunctionsLibrary::fechaMysqlToReal($item->fecha); ?></span>
                                <span><?php echo $item->usuarioNombre ?></span>
                                <span> 
                                    <?php echo $item->tagNombre; ?>
                                </span>
                            </div>
                            <?php 
                                $endSubTitle = strpos($item->texto, '</');
                            ?>
                            <p><?php echo str_replace("\r", '',  substr($item->texto,0, $endSubTitle)); ?>...</p>
                        </div>
                        
                    </article>
                <?php } ?>
            </div>
              <!-- Sidebar -->
            <div class="col-md-4 sidebar-container">
                <div class="sidebar">
                        <div class="categories widget">
                            <h3 class="widget-head">Sectores</h3>
                            <ul>
                                <?php foreach (@$sectors as $sector){

                                    // if($filtro->)
                                    @$sectorsAll .= sprintf('<li><a href="#@" class="sector" data-id="%d">%s</a><span class="badge">%s</span></li>',$sector->id, $sector->nombre, $sector->count);
                                }

                                echo @$sectorsAll;
                                ?>
                            </ul>
                        </div>

                        
                        
                        <div class="recent-post widget tag-container">
                            <h3>Etiquetas</h3>
                            <div class="form-group form-group-container">
                                <ul class="tag-ul-selected-container">
                                </ul>
                                <!-- </span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span> -->
                                    <input class="tag-search-input form-control" type="search" tabindex="0" autocomplete="off" autocorrect="off" autocapitalize="none" spellcheck="false" role="textbox" aria-autocomplete="list" placeholder="Buscar tag...">
                            </div>
                            <ul class="tag-ul">
                                <?php 
                                foreach ($tags as $tag){
                                    @$tagsAll .= sprintf('<li class="tag" data-id="%d">%s</li>',$tag->id, $tag->nombre);
                                }

                                echo $tagsAll;

                                ?>
                            </ul>
                            
                        </div>

                        <!-- <div class="form-group col-md-6">
                          <label>Etiquetas</label>
                          <select class="form-control etiquetas" name="etiquetas[]" multiple="multiple" data-placeholder="Seleccione etiquetas"
                                  style="width: 100%;">
                              <?php foreach ($tags as $tag): ?>
                                <option value="<?php echo $tag->id; ?>" 
                                  <?php // foreach ($itemsTags as $it){ 
                                    // echo ($it->idItem == @$item->id && $it->idTag == $tag->id) ? 'selected' : '';  
                                   //} ?>
                                  >
                                  <?php echo $tag->nombre; ?>
                                </option>
                              <?php endforeach ?>
                          </select>
                        </div> -->
                        
                </div>
            </div>
        </div>
    </div>
</section> 

<script type="text/javascript">
    $(function(){
        var limitTotal = 10; 
        var limitFrom = 10; 
        var delayBusqueda;
        var $win = $(window);

        $('.etiquetas').select2();

        // FILTRAL POR SECTOR
        $('.sector').click(function(event) {
            $('.actived').removeClass('actived');
            $(this).addClass('actived');

            filterItem();

        });

        /* BUSCAR ITEMS */
        $('#item-search').keyup(function(event) {
            $('.nofilter-container a').show();
            clearTimeout(delayBusqueda);
            event.stopPropagation();
            
            delayBusqueda = setTimeout(function(){
                filterItem();
            },500);
        });

        // TAG NO SELECTED
        $('.tag-container').on('click', '.tag', function(event) {
            var elem = $(this).clone();
            $(elem).prepend('<span class="tag-remove" role="presentation">×</span>');
            $(elem).removeClass('tag');
            $(elem).addClass('tag-selected');

            $('.tag-ul-selected-container').append(elem);

            $(this).remove();

            filterItem();

        });

        $('.tag-search-input').keyup(function(event) {
            var params = $(this).val().toLowerCase();

            clearTimeout(delayBusqueda);
            event.stopPropagation();
            
            delayBusqueda = setTimeout(function(){
                $('.tag-ul li').each(function(index, el) {
                    var elementName = $(el).text().toLowerCase();

                    if (elementName.search(params)>=0) {
                        $(el).show();
                    } else {
                        $(el).hide();
                    }
                    
                });
            },300);
        });

        // TAG SELECTED
        $('.tag-container').on('click', '.tag-remove', function(event) {
            var tag = $(this).parent();
            $('.tag-remove', tag).remove();
            $(tag).removeClass('tag-selected');
            $(tag).addClass('tag');
            // console.log(tag);

            $('.tag-ul').append(tag);

            $(this).parent().remove();
           
            filterItem();
        });

        function filterItem() {

            limitFrom = 0; 

            var params = $('#item-search').val();
            var sector = $($('.sector.actived')[0]).attr('data-id');
            var tags = '';
            var tagsArr = new Array();
            tagsArr = $('.tag-ul-selected-container').children();
            $(tagsArr).each(function(index, el) {
                tags += (index==0) ? $(el).attr('data-id') : ','+$(el).attr('data-id');
            });

            if (params=="" && sector==undefined && tags=="") {
                    $('.nofilter-container a').hide();
            } else {
                    $('.nofilter-container a').show();
            }

            getDataFilter("item",params,sector,tags).then(function(data){
                    $('#list-item-container').empty();
                    if(printDataFilter(data)==false){
                        $('#list-item-container').append('<p class="wow fadeInDown text-center" data-wow-delay=".3s" data-wow-duration="500ms" style="color:#a94442">Sin resultados</p>');
                    }else{
                        limitFrom+=10;
                    }

                    $win = $(window).scrollTop(0);

            }, function(){

            });
         }

        function getDataByScroll() {
            var filter = hasFilter();

            if (filter.hasFilter) {
                getDataFilter("item",filter.params,filter.sector,filter.tags,limitTotal,limitFrom).then(function(data){
                    if(printDataFilter(data)){
                        limitFrom+=10;
                    }
                }, function(){

                });
            } else {
                getAllData(limitTotal,limitFrom).then(function(data){
                    if(printDataFilter(data)){
                        limitFrom+=10;
                    }
                }, function(){

                });
            }
        }

        function hasFilter() {
            var filterSector = $('.sector.actived');
            var filterTag = $('.tag.actived');
            var filterParams = $('#item-search').val();

            var result = {hasFilter:false}
            if (filterSector.length>0 || filterTag.length>0 || filterParams!="") {
                var idSector = $(filterSector[0]).attr('data-id');

                result = {hasFilter:true,params:filterParams,sector:idSector,tags:''};
            }

            return result;

        }

        function getDataFilter(thatFilter="item",params="", sector="", tags="",limitTotal=10,limitFrom=0 ) {

            return new Promise((resolve, reject) => {
                $.ajax({
                    url: '<?php echo base_url() ?>DocumentationController/filter',
                    type: 'POST',
                    dataType: 'json',
                    data: {params: params, sector:sector, tags:tags,limitTotal:limitTotal,limitFrom:limitFrom},
                })
                .done(function(data) {
                    // console.log("success",data);
                    resolve(data);
                })
                .fail(function(data) {
                    console.log("error",data);
                    reject(false)
                });
            });
            
        }

        function getAllData(limitTotal=10,limitFrom=0 ) {

            return new Promise((resolve, reject) => {
                $.ajax({
                    url: '<?php echo base_url() ?>DocumentationController/findByScroll',
                    type: 'POST',
                    dataType: 'json',
                    data: {limitTotal:limitTotal,limitFrom:limitFrom},
                })
                .done(function(data) {
                    console.log("success",data);
                    resolve(data);
                })
                .fail(function(data) {
                    console.log("error",data);
                    reject(false)
                });
            });
            
        }

        function printDataFilter(data) {
            var article;
            if (data.length==0) {

                return false;
             
            }

            data.forEach(function(item,i){
                var texto = (item.texto) ? item.texto.substring(0,70) : "";
                var fecha = formatMysqlToReal(item.fecha) || '';
                var sector = item.nombreSector || '';
                var tags = item.tagNombre || '';
                article = `<article class="wow fadeInDown" data-wow-delay=".3s" data-wow-duration="500ms" data-title="${item.titulo}">
                            <div class="blog-content">
                                <h3 class="blogpost-title">
                                <a href="<?php echo base_url() ?>DocumentationController/itemView/${item.id}">${item.titulo}</a>
                                </h3>
                                <div class="blog-meta">
                                    <span>${sector}</span>
                                    <span>${fecha}</span>
                                    <span>by <a href="">Wsoto</a></span>
                                    <span><a href="">${tags}</a></span>
                                </div>
                                <p>${texto}...</p>
                            </div>
                        </article>`;

                $('#list-item-container').append(article);
            })

            return true;
        }

        // SCROLL INFINITO
         var headerHeight = $('header').outerHeight();
         var searchHeight = $('.global-page-header').outerHeight();
         var searchWidth = $('.global-page-header').outerWidth();
         var searchPosition = $('.global-page-header').position();
         var searchPositionTemp = $('.global-page-header').position().top;
         var sidebarPosition = $('.sidebar-container').position();
         var sidebarPositionCurrent = $('.sidebar-container').position();
         var sidebarHeight = $('.sidebar-container').outerHeight();
         var sidebarWidth = $('.sidebar-container').outerWidth();
         var sidebarPositionBefore = (headerHeight+searchHeight)-sidebarPosition.top;
         var documentHeight = $(document).height();
         var searchPositionTemp;
         var sidebarPositionTemp = sidebarPosition.top;
         var overSidebar = (sidebarPosition.top+sidebarHeight)-$win.height()
         var searchPositionAfter = headerHeight-searchPosition.top;
         var scrolled;
         var currentScroll = 0;
         var isFixed = false;
         var isVisible = 90;
         var couldVisible = 90;
         var canScroll = false;

         $win.resize(function(event) {
                $win = $(window);
                headerHeight = $('header').outerHeight();
                searchHeight = $('.global-page-header').outerHeight();
                searchPosition = $('.global-page-header').position();
                searchPositionTemp = $('.global-page-header').position().top;
                sidebarPosition = $('.sidebar-container').position();
                sidebarPositionTemp = sidebarPosition.top;
                sidebarPositionCurrent = $('.sidebar-container').position();
                sidebarHeight = $('.sidebar-container').outerHeight();
                sidebarWidth = $('.sidebar-container').outerWidth();
                searchHeight = $('.global-page-header').outerHeight();
                searchWidth = $('.global-page-header').outerWidth();
                sidebarPositionBefore = (searchHeight)-sidebarPosition.top;
                searchPositionAfter = headerHeight-searchPosition.top;
                documentHeight = $(document).height();
                overSidebar = (sidebarPosition.top+sidebarHeight)-$win.height()
         });

        $win.scroll(function () {
                documentHeight = $(document).height();
                sidebarPositionCurrent = $('.sidebar-container').position();
                searchPositionCurrent = $('.global-page-header').position().top;
                        // console.log('scroll',$win.scrollTop());
                        // console.log('scroll',$win.scrollTop()  + $win.height());

                        // console.log('current',currentScroll);
                // SI EL SCROLL SUBE
                if (currentScroll > $win.scrollTop() && (documentHeight > 1200 && $win.width()>980 && $win.height()>(sidebarHeight))) {                        
                            // console.log('temp',sidebarPositionTemp);
                        scrolled = currentScroll - $win.scrollTop();
                        if (isVisible<=couldVisible) {
                            isVisible = isVisible+scrolled;
                            canScroll = false;
                        } 
                        
                        if (sidebarPositionCurrent.top<=sidebarPosition.top) {
                            sidebarPositionTemp = $('.sidebar-container').position().top+scrolled;
                            $('.sidebar-container').css({
                                 // 'position': 'fixed',
                                 'top': sidebarPositionTemp+'px',
                                 // 'left': sidebarPosition.left+'px',
                                 // 'width': sidebarWidth+'px'
                            });
                        } else {
                            isFixed=false;
                        }

                        if (searchPositionCurrent<searchPosition.top) {
                            console.log('initial ',sidebarPosition.top);
                            searchPositionTemp = $('.global-page-header').position().top;
                            scrolled = currentScroll - $win.scrollTop();
                            searchPositionTemp = searchPositionTemp+scrolled;
                            if (searchPositionTemp>searchPosition.top) { searchPositionTemp=searchPosition.top;}
                            $('.global-page-header').css({
                                 // 'position': 'fixed',
                                 'top': searchPositionTemp+'px',
                                 // 'left': sidebarPosition.left+'px',
                                 // 'width': sidebarWidth+'px'
                            });
                        }
                } 


                if ($win.scrollTop() >= overSidebar && (documentHeight > 900 && $win.width()>980 && $win.height()>sidebarHeight) ){
                     // SI EL SCROLL BAJA
                     if (currentScroll < $win.scrollTop()) {
                        scrolled = $win.scrollTop()-currentScroll;
                        if (isVisible>=0) {
                            isVisible = isVisible-scrolled;
                        } else {
                            canScroll = true;
                        }
                        if ( isVisible<couldVisible ) {
                                 $('.sidebar-container').css({
                                         'position': 'fixed',
                                         'top': (isVisible+headerHeight)+'px',
                                         'left': sidebarPosition.left+'px',
                                         'width': sidebarWidth+'px'
                                 });
                                 searchPositionTemp = $('.global-page-header').position().top;
                                 searchPositionBefore = searchPositionTemp-scrolled;
                                 $('.global-page-header').css({
                                         'position': 'fixed',
                                         'top': searchPositionBefore+'px',
                                         'left': searchPosition.left+'px',
                                         'width': searchWidth+'px'
                                 });
                                 // $('#list-item-container').css('margin-top', searchHeight+'px');
                        }
                                console.log('scrolled',scrolled);
                                console.log('searchPositionTemp',searchPositionTemp);

                         if (sidebarPositionCurrent.top>=(sidebarPosition.top-searchHeight) && canScroll) {
                             $('.sidebar-container').css({
                                     'position': 'fixed',
                                     'top': sidebarPositionBefore+'px',
                                     'left': sidebarPosition.left+'px',
                                     'width': sidebarWidth+'px'
                             });
                            // console.log('search',searchPositionTemp);
                            searchPositionTemp = $('.global-page-header').position().top;
                            searchPositionBefore = searchPositionTemp-scrolled;
                             $('.global-page-header').css({
                                     'position': 'fixed',
                                     'top': '-200px',
                                     'left': searchPosition.left+'px',
                                     'width': searchWidth+'px'
                             });
                            $('#list-item-container').css('margin-top', searchHeight+'px');
                         }
                     }

                     isFixed = true;
                     currentScroll = $win.scrollTop();
                     

                 } else if (isFixed) {
                     $('.sidebar-container').css({
                             'top': sidebarPositionTemp+'px',
                     });
                 } 

                 if (($win.scrollTop()  + $win.height())
                                == documentHeight  && (documentHeight > 1200 && $win.width()>980 && $win.height()>(sidebarHeight))) {
                     getDataByScroll();
                 }

                 if ($win.scrollTop()==0) {
                     isFixed = false;
                     currentScroll = $win.scrollTop();

                     $('.sidebar-container').css({
                             'position': 'relative',
                             'top': '',
                             'left': '',
                             'width': ''
                     });
                     $('.global-page-header').css({
                             'position': 'relative',
                             'top': '',
                             'left': '',
                             'width': ''
                     });
                    
                     $('#list-item-container').css('margin-top', '');
                 }

                
             });
    })

</script>
