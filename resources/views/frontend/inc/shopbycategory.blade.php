  <div class="sidebar-widget-body">
                                    <div class="accordion">
                                        @if (!empty($_GET['category']))
                                        @php
                                        $filtercat = explode(',',$_GET['category'])
                                        @endphp
                                        @else
                                        @endif
                                        @foreach ($categories as $category)
                                        <div class="accordion-group">
                                            <div class="accordion-heading">
                                                <div class="form-group">
                                                    <label for="form-check-lavel">
                                                        <input type="checkbox" class="form-check-input" name="category[]" value="{{ $category->slug }}" @if(!empty($filtercat) && in_array($category->slug, $filtercat)) checked @endif onchange="this.form.submit();">
                                                        {{ $category->category_name }}
                                                    </label>
                                                </div>
                                            </div><!-- /.accordion-heading -->
                                        </div><!-- /.accordion-group -->
                                        @endforeach
                                    </div><!-- /.accordion -->
                                </div><!-- /.sidebar-widget-body -->