@extends('layouts.main')

@section('content')
    <section class="banner">
        <div class="banner__wrapper container">
            <div class="row flex-center">
                <div class="banner__form col-lg-6 col-12">
                    <div class="banner__form_wrapper">
                        <form>
                            <h3 class="banner__form_title">Знайти автомобіль</h3>
                            <div class="banner__form_fields-wrapper row">
                                <label for="car-details__year" class="col-sm-6 col-12 banner__form_field">
                                    <select class="select-list select-list__default select-list__car-details" id="car-details__brand" name="brand">
                                        <option value="" disabled="" selected="" hidden="">Марка</option>
                                        @foreach($brands as $brand)
                                            <option {{ app('request')->input('brand') == $brand->id ? 'selected' : null }} value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    </select>
                                </label>
                                <label for="car-details__model" class="col-sm-6 col-12 banner__form_field">
                                    <select class="select-list select-list__default select-list__car-details" name="model" id="car-details__model" tabindex="-1" style="display: none;" data-ssid="ss-13529">
                                        <option value="" disabled="" selected="" hidden="">Модель</option>
                                        @foreach($models as $model)
                                            <option {{ app('request')->input('model') == $model->id ? 'selected' : null }} value="{{ $model->id }}">{{ $model->name }}</option>
                                        @endforeach
                                    </select>
                                    <div class="ss-13529 ss-main select-list select-list__default select-list__car-details" style=""></div>
                                </label>
                                <label for="car-details__kilometrage" class="col-sm-6 col-12 banner__form_field">
                                    <select class="select-list select-list__default select-list__car-details" name="mileageFrom" id="car-details__kilometrage-from" tabindex="-1" style="display: none;" data-ssid="ss-46814">
                                        <option value="" disabled="" selected="" hidden="">Пробіг від</option>
                                        @foreach($distances as $distance)
                                            <option {{ app('request')->input('mileageFrom') == $distance->distance ? 'selected' : null }} value="{{ $distance->distance }}">{{ $distance->distance }}</option>
                                        @endforeach
                                    </select>
                                    <div class="ss-46814 ss-main select-list select-list__default select-list__car-details" style=""></div>
                                </label>
                                <label for="car-details__year" class="col-sm-6 col-12 banner__form_field">
                                    <select class="select-list select-list__default select-list__car-details" name="mileageTo" id="car-details__kilometrage-from-to" tabindex="-1" style="display: none;" data-ssid="ss-11288">
                                        <option value="" disabled="" selected="" hidden="">Пробіг до</option>
                                        @foreach($distances as $distance)
                                            <option {{ app('request')->input('mileageTo') == $distance->distance ? 'selected' : null }} value="{{ $distance->distance }}">{{ $distance->distance }}</option>
                                        @endforeach
                                    </select>
                                    <div class="ss-11288 ss-main select-list select-list__default select-list__car-details" style=""></div>
                                </label>
                                <label for="car-details__year" class="col-sm-6 col-12 banner__form_field">
                                    <select class="select-list select-list__default select-list__car-details" name="yearFrom" id="car-details__year-from" tabindex="-1" style="display: none;" data-ssid="ss-83200">
                                        <option value="" disabled="" selected="" hidden="">Рік від</option>
                                        @foreach($years as $year)
                                            <option {{ app('request')->input('yearFrom') == $year->year ? 'selected' : null }} value="{{ $year->year }}">{{ $year->year }}</option>
                                        @endforeach
                                    </select>
                                    <div class="ss-83200 ss-main select-list select-list__default select-list__car-details" style=""></div>
                                </label>
                                <label for="car-details__year" class="col-sm-6 col-12 banner__form_field">
                                    <select class="select-list select-list__default select-list__car-details" name="yearTo" id="car-details__year-to" tabindex="-1" style="display: none;" data-ssid="ss-91190">
                                        <option value="" disabled="" selected="" hidden="">Рік до</option>
                                        @foreach($years as $year)
                                            <option {{ app('request')->input('yearTo') == $year->year ? 'selected' : null }} value="{{ $year->year }}">{{ $year->year }}</option>
                                        @endforeach
                                    </select>
                                    <div class="ss-91190 ss-main select-list select-list__default select-list__car-details" style=""></div>
                                </label>
                                <div class="banner__form_button-group col-12">
                                    <button class="banner__form_button-submit" type="submit">Підібрати автомобіль</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <article>
        @foreach($cars as $car)
        <section>
            <div class="car-article">
                <div class="car-article_info">
                    <div class="image">
                        <img class="car-article_car-photo" src="{{ asset('/images/' . $car->image) }}" alt="car">
                    </div>
                    <div class="desc">
                        <span class="car-article_title">{{ $car->name }}</span>
                        <div class="car-article_auction">
                            <span class="auction_price">Ціна: {{ $car->price }} $</span>
                        </div>
                        <div class="car-article_spec">
                            <div class="spec_name">
                                <p>Двигун:</p>
                                <p>Пробіг:</p>
                                <p>Коробка передач:</p>
                                <p>Вид палива:</p>
                            </div>
                            <div class="spec_current-car">
                                <p>{{ $car->engine ?? '-' }}</p>
                                <p>{{ $car->distance ?? '-' }} км</p>
                                <p>{{ $car->gear ?? '-' }}</p>
                                <p>{{ $car->fuel ?? '-' }}</p>
                            </div>
                            <div class="spec_button">
                                <a href="{{ $car->url }}" class="button_watch-list">Перейти на сайт</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endforeach
        {{ $cars->links() }}
    </article>
@endsection






