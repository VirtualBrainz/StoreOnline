
        <div class="side-menu animate-dropdown outer-bottom-xs">
          <div class="head"><i class="icon fa fa-align-justify fa-fw"></i> Categories</div>
          <nav class="yamm megamenu-horizontal">
            <ul class="nav">
                @foreach ($categorias as $categoria)
                  @if ($categoria->front == 'YES')

                    <li class="dropdown menu-item"> <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="icon fa " aria-hidden="true"></i>{{$categoria->name}}</a>
                        <ul class="dropdown-menu mega-menu">
                          <li class="yamm-content">
                            <div class="row">
                              @foreach ($categoria->subcategories as $subcategoria)
                                <div class="col-sm-12 col-md-3">
                                    <ul class="links list-unstyled">
                                    {{--  @foreach ($categoria->subcategories as $subcategoria)  --}}
                                        <li><a href="{{route('web.category', $subcategoria->slug)}}">{{$subcategoria->name}}</a></li>
                                    {{--  @endforeach  --}}
                                    </ul>
                                </div>
                              @endforeach
                            </div>
                          </li>
                        </ul>
                    </li>
                  @endif
                @endforeach
            </ul>
          </nav>
        </div>