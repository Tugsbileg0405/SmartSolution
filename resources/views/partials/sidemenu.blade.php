@if($categories->isEmpty())
<div class="products">
    <div class="col-md-12">
        <p class="text-center">Категори байхгүй байна.</p>
    </div>
</div>
@else
    <div class="card card-refine">
        <div class="panel-group" id="accordion" aria-multiselectable="true" aria-expanded="true">
            @foreach($categories as $index => $category)
            <div class="card-header card-collapse" role="tab">
                <h5 class="mb-0 panel-title">
                    <a class="" data-toggle="collapse" data-parent="#accordion" href="#collapse{{$category->id}}" aria-expanded="true" aria-controls="collapseTree">
                        {{$category->name}}
                        <i class="nc-icon nc-minimal-down"></i>
                    </a>
                </h5>
            </div>
            <div id="collapse{{$category->id}}" class="collapse show sidemenu-product" role="tabpanel" aria-labelledby="headingOne" aria-expanded="true">
                @if(!$category->brands->isEmpty())
                    <div class="card-block">
                        @foreach($category->brands as $brand)
                        <div class="card-text">
                            <a class="{{ Request::is('brand/'.$brand->id) ? 'active' : '' }}" href="{{ URL('/brand', ['brand' => $brand->id]) }}">
                                {{$brand->name}}
                            </a>
                        </div>
                        @endforeach
                        {{ Request::is('/brand/'.$brand->id) }}
                    </div>
                @endif
            </div>
            @endforeach
        </div>
    </div>
@endif