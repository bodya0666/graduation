@extends('layout.main')



@section('content')
    <section class="banner">
        <div class="banner__wrapper container">
            <div class="row flex-center">
                <div class="banner__form col-lg-6 col-12">
                    <div class="banner__form_wrapper">
                        <form>
                            <h3 class="banner__form_title">Знайти автомобіль</h3>
                            <div class="banner__form_fields-wrapper row">
                                <label for="car-details__brand" class="col-sm-6 col-12 banner__form_field">
                                    <select class="select-list select-list__default select-list__car-details" id="car-details__brand" name="brands[]" tabindex="-1" style="display: none;" data-ssid="ss-12582">
                                        <option value="" disabled="" selected="" hidden="">Марка</option>
                                        <option value="62">Volkswagen</option>
                                        <option value="38">Mercedes-Benz</option>
                                        <option value="49">Renault</option>
                                        <option value="45">Opel</option>
                                        <option value="3">BMW</option>
                                        <option value="20">Ford</option>
                                        <option value="2">Audi</option>
                                        <option value="54">Skoda</option>
                                        <option value="61">Toyota</option>
                                        <option value="44">Nissan</option>
                                        <option value="23">Hyundai</option>
                                        <option value="22">Honda</option>
                                        <option value="46">Peugeot</option>
                                        <option value="42">Mitsubishi</option>
                                        <option value="8">Chevrolet</option>
                                        <option value="37">Mazda</option>
                                        <option value="29">Kia</option>
                                        <option value="18">Fiat</option>
                                        <option value="10">Citroën</option>
                                        <option value="63">Volvo</option>
                                        <option value="4">Abarth</option>
                                        <option value="5">Aixam</option>
                                        <option value="1">Alfa Romeo</option>
                                        <option value="76">Alpina</option>
                                        <option value="83">Aston Martin</option>
                                        <option value="89">AUSA</option>
                                        <option value="101">Benimar</option>
                                        <option value="65">Bentley</option>
                                        <option value="96">Bollore</option>
                                        <option value="109">Bollore</option>
                                        <option value="85">Brilliance</option>
                                        <option value="6">Buick</option>
                                        <option value="102">Burstner</option>
                                        <option value="92">Cadillac</option>
                                        <option value="103">CASALINI</option>
                                        <option value="7">Chatenet</option>
                                        <option value="9">Chrysler</option>
                                        <option value="107">Cupra</option>
                                        <option value="11">Dacia</option>
                                        <option value="12">Daewoo</option>
                                        <option value="71">DAF</option>
                                        <option value="13">Daihatsu</option>
                                        <option value="98">Deutz-Fahr</option>
                                        <option value="14">Dodge</option>
                                        <option value="15">Ds</option>
                                        <option value="70">Ducati</option>
                                        <option value="16">Effedi</option>
                                        <option value="17">Elnagh</option>
                                        <option value="87">Fendt</option>
                                        <option value="78">Ferrari</option>
                                        <option value="19">Fisker</option>
                                        <option value="21">Fuso</option>
                                        <option value="95">Goupil</option>
                                        <option value="73">Hako</option>
                                        <option value="111">Hymer</option>
                                        <option value="24">Infiniti</option>
                                        <option value="25">Isuzu</option>
                                        <option value="26">Iveco</option>
                                        <option value="27">Jaguar</option>
                                        <option value="28">Jeep</option>
                                        <option value="84">Jungheinrich</option>
                                        <option value="97">Knaus</option>
                                        <option value="79">Kubota</option>
                                        <option value="77">Kymco</option>
                                        <option value="30">Lada</option>
                                        <option value="91">Lamborghini</option>
                                        <option value="31">Lancia</option>
                                        <option value="32">Land Rover</option>
                                        <option value="33">Lexus</option>
                                        <option value="34">Ligier</option>
                                        <option value="35">Lotus</option>
                                        <option value="69">MAN</option>
                                        <option value="36">Maserati</option>
                                        <option value="81">Maybach</option>
                                        <option value="100">McLaren</option>
                                        <option value="108">Mega</option>
                                        <option value="39">MG</option>
                                        <option value="40">MIA</option>
                                        <option value="88">Microcar</option>
                                        <option value="41">MINI</option>
                                        <option value="86">Morgan</option>
                                        <option value="43">Moto Guzzi</option>
                                        <option value="68">Mulag</option>
                                        <option value="93">Multicar</option>
                                        <option value="47">Piaggio</option>
                                        <option value="90">Pontiac</option>
                                        <option value="48">Porsche</option>
                                        <option value="99">Proton</option>
                                        <option value="82">Rolls-Royce</option>
                                        <option value="50">Rover</option>
                                        <option value="51">Saab</option>
                                        <option value="66">Santana</option>
                                        <option value="80">Scania</option>
                                        <option value="53">SEAT</option>
                                        <option value="110">Setra</option>
                                        <option value="55">Smart</option>
                                        <option value="56">SsangYong</option>
                                        <option value="74">Still</option>
                                        <option value="57">Subaru</option>
                                        <option value="59">Suzuki</option>
                                        <option value="105">Tata</option>
                                        <option value="60">Tesla</option>
                                        <option value="106">Triumph</option>
                                        <option value="94">Vauxhall</option>
                                        <option value="67">Wiesmann</option>
                                        <option value="64">Yamaha</option>
                                    </select>
                                    <div class="ss-12582 ss-main select-list select-list__default select-list__car-details" style="">
                                        <div class="ss-single-selected"><span class="placeholder">Марка</span><span class="ss-deselect ss-hide">x</span><span class="ss-arrow"><span class="arrow-down"></span></span></div>
                                        <div class="ss-content">
                                            <div class="ss-search ss-hide"><input readonly="" type="search" placeholder="Search" tabindex="0" aria-label="Search"></div>
                                            <div class="ss-list">
                                                <div class="ss-option ss-disabled ss-option-selected" data-id="65527656">Марка</div>
                                                <div class="ss-option" data-id="10324068">Volkswagen</div>
                                                <div class="ss-option" data-id="221821">Mercedes-Benz</div>
                                                <div class="ss-option" data-id="74670560">Renault</div>
                                                <div class="ss-option" data-id="84447984">Opel</div>
                                                <div class="ss-option" data-id="87989313">BMW</div>
                                                <div class="ss-option" data-id="44867677">Ford</div>
                                                <div class="ss-option" data-id="33466562">Audi</div>
                                                <div class="ss-option" data-id="54727323">Skoda</div>
                                                <div class="ss-option" data-id="5066619">Toyota</div>
                                                <div class="ss-option" data-id="69718458">Nissan</div>
                                                <div class="ss-option" data-id="9210761">Hyundai</div>
                                                <div class="ss-option" data-id="66929424">Honda</div>
                                                <div class="ss-option" data-id="34343921">Peugeot</div>
                                                <div class="ss-option" data-id="68663457">Mitsubishi</div>
                                                <div class="ss-option" data-id="55228584">Chevrolet</div>
                                                <div class="ss-option" data-id="90729675">Mazda</div>
                                                <div class="ss-option" data-id="35333648">Kia</div>
                                                <div class="ss-option" data-id="81325690">Fiat</div>
                                                <div class="ss-option" data-id="71921815">Citroën</div>
                                                <div class="ss-option" data-id="6345516">Volvo</div>
                                                <div class="ss-option" data-id="63624537">Abarth</div>
                                                <div class="ss-option" data-id="98591688">Aixam</div>
                                                <div class="ss-option" data-id="9623208">Alfa Romeo</div>
                                                <div class="ss-option" data-id="78960945">Alpina</div>
                                                <div class="ss-option" data-id="37049049">Aston Martin</div>
                                                <div class="ss-option" data-id="85997012">AUSA</div>
                                                <div class="ss-option" data-id="35457513">Benimar</div>
                                                <div class="ss-option" data-id="95369225">Bentley</div>
                                                <div class="ss-option" data-id="60544099">Bollore</div>
                                                <div class="ss-option" data-id="81396838">Bollore</div>
                                                <div class="ss-option" data-id="40118553">Brilliance</div>
                                                <div class="ss-option" data-id="53361561">Buick</div>
                                                <div class="ss-option" data-id="76830830">Burstner</div>
                                                <div class="ss-option" data-id="2721801">Cadillac</div>
                                                <div class="ss-option" data-id="33121402">CASALINI</div>
                                                <div class="ss-option" data-id="34867895">Chatenet</div>
                                                <div class="ss-option" data-id="54927057">Chrysler</div>
                                                <div class="ss-option" data-id="91264203">Cupra</div>
                                                <div class="ss-option" data-id="36718335">Dacia</div>
                                                <div class="ss-option" data-id="11020799">Daewoo</div>
                                                <div class="ss-option" data-id="91207404">DAF</div>
                                                <div class="ss-option" data-id="49425775">Daihatsu</div>
                                                <div class="ss-option" data-id="59073782">Deutz-Fahr</div>
                                                <div class="ss-option" data-id="15547320">Dodge</div>
                                                <div class="ss-option" data-id="23247963">Ds</div>
                                                <div class="ss-option" data-id="90975248">Ducati</div>
                                                <div class="ss-option" data-id="99004378">Effedi</div>
                                                <div class="ss-option" data-id="51867026">Elnagh</div>
                                                <div class="ss-option" data-id="59470032">Fendt</div>
                                                <div class="ss-option" data-id="27088956">Ferrari</div>
                                                <div class="ss-option" data-id="4282079">Fisker</div>
                                                <div class="ss-option" data-id="89857741">Fuso</div>
                                                <div class="ss-option" data-id="73332969">Goupil</div>
                                                <div class="ss-option" data-id="71808229">Hako</div>
                                                <div class="ss-option" data-id="2460015">Hymer</div>
                                                <div class="ss-option" data-id="39598296">Infiniti</div>
                                                <div class="ss-option" data-id="2544479">Isuzu</div>
                                                <div class="ss-option" data-id="37703442">Iveco</div>
                                                <div class="ss-option" data-id="13742175">Jaguar</div>
                                                <div class="ss-option" data-id="10632340">Jeep</div>
                                                <div class="ss-option" data-id="50650199">Jungheinrich</div>
                                                <div class="ss-option" data-id="16091629">Knaus</div>
                                                <div class="ss-option" data-id="27321099">Kubota</div>
                                                <div class="ss-option" data-id="77185757">Kymco</div>
                                                <div class="ss-option" data-id="16120846">Lada</div>
                                                <div class="ss-option" data-id="20110689">Lamborghini</div>
                                                <div class="ss-option" data-id="94521152">Lancia</div>
                                                <div class="ss-option" data-id="6444523">Land Rover</div>
                                                <div class="ss-option" data-id="86503768">Lexus</div>
                                                <div class="ss-option" data-id="35402822">Ligier</div>
                                                <div class="ss-option" data-id="6927962">Lotus</div>
                                                <div class="ss-option" data-id="44440617">MAN</div>
                                                <div class="ss-option" data-id="26756335">Maserati</div>
                                                <div class="ss-option" data-id="88786123">Maybach</div>
                                                <div class="ss-option" data-id="71622777">McLaren</div>
                                                <div class="ss-option" data-id="27731097">Mega</div>
                                                <div class="ss-option" data-id="13799236">MG</div>
                                                <div class="ss-option" data-id="19849566">MIA</div>
                                                <div class="ss-option" data-id="73294277">Microcar</div>
                                                <div class="ss-option" data-id="11852497">MINI</div>
                                                <div class="ss-option" data-id="7375523">Morgan</div>
                                                <div class="ss-option" data-id="84377859">Moto Guzzi</div>
                                                <div class="ss-option" data-id="95938244">Mulag</div>
                                                <div class="ss-option" data-id="12179603">Multicar</div>
                                                <div class="ss-option" data-id="74174682">Piaggio</div>
                                                <div class="ss-option" data-id="62249615">Pontiac</div>
                                                <div class="ss-option" data-id="74298734">Porsche</div>
                                                <div class="ss-option" data-id="52670319">Proton</div>
                                                <div class="ss-option" data-id="63545043">Rolls-Royce</div>
                                                <div class="ss-option" data-id="1685644">Rover</div>
                                                <div class="ss-option" data-id="1098270">Saab</div>
                                                <div class="ss-option" data-id="25082555">Santana</div>
                                                <div class="ss-option" data-id="26060068">Scania</div>
                                                <div class="ss-option" data-id="85809217">SEAT</div>
                                                <div class="ss-option" data-id="94380824">Setra</div>
                                                <div class="ss-option" data-id="93943522">Smart</div>
                                                <div class="ss-option" data-id="94239389">SsangYong</div>
                                                <div class="ss-option" data-id="93346797">Still</div>
                                                <div class="ss-option" data-id="52862663">Subaru</div>
                                                <div class="ss-option" data-id="47238803">Suzuki</div>
                                                <div class="ss-option" data-id="18987796">Tata</div>
                                                <div class="ss-option" data-id="4636541">Tesla</div>
                                                <div class="ss-option" data-id="77929687">Triumph</div>
                                                <div class="ss-option" data-id="33422954">Vauxhall</div>
                                                <div class="ss-option" data-id="96528165">Wiesmann</div>
                                                <div class="ss-option" data-id="18675250">Yamaha</div>
                                            </div>
                                        </div>
                                    </div>
                                </label>
                                <label for="car-details__model" class="col-sm-6 col-12 banner__form_field">
                                    <select class="select-list select-list__default select-list__car-details" name="models[]" id="car-details__model" tabindex="-1" style="display: none;" data-ssid="ss-13529">
                                        <option value="" disabled="" selected="" hidden="">Модель</option>
                                    </select><div class="ss-13529 ss-main select-list select-list__default select-list__car-details" style=""><div class="ss-single-selected"><span class="placeholder">Модель</span><span class="ss-deselect ss-hide">x</span><span class="ss-arrow"><span class="arrow-down"></span></span></div><div class="ss-content"><div class="ss-search ss-hide"><input readonly="" type="search" placeholder="Search" tabindex="0" aria-label="Search"></div><div class="ss-list"><div class="ss-option ss-disabled ss-option-selected" data-id="60560149">Модель</div></div></div></div>
                                </label>
                                <label for="car-details__kilometrage" class="col-sm-6 col-12 banner__form_field">
                                    <select class="select-list select-list__default select-list__car-details" name="mileageFrom" id="car-details__kilometrage-from" tabindex="-1" style="display: none;" data-ssid="ss-46814">
                                        <option value="" disabled="" selected="" hidden="">Пробіг від</option>
                                        <option value="1000">1000</option>
                                        <option value="10000">10000</option>
                                        <option value="100000">100000</option>
                                        <option value="150000">150000</option>
                                        <option value="200000">200000</option>
                                        <option value="250000">250000</option>
                                        <option value="300000">300000</option>
                                        <option value="400000">400000</option>
                                        <option value="50000">50000</option>
                                        <option value="500000">500000</option></select><div class="ss-46814 ss-main select-list select-list__default select-list__car-details" style=""><div class="ss-single-selected"><span class="placeholder">Пробіг від</span><span class="ss-deselect ss-hide">x</span><span class="ss-arrow"><span class="arrow-down"></span></span></div><div class="ss-content"><div class="ss-search ss-hide"><input readonly="" type="search" placeholder="Search" tabindex="0" aria-label="Search"></div><div class="ss-list"><div class="ss-option ss-disabled ss-option-selected" data-id="52988295">Пробіг від</div><div class="ss-option" data-id="60359304">1000</div><div class="ss-option" data-id="13794448">10000</div><div class="ss-option" data-id="8760913">100000</div><div class="ss-option" data-id="81019854">150000</div><div class="ss-option" data-id="54572431">200000</div><div class="ss-option" data-id="39318455">250000</div><div class="ss-option" data-id="88593722">300000</div><div class="ss-option" data-id="47421359">400000</div><div class="ss-option" data-id="27839170">50000</div><div class="ss-option" data-id="18999314">500000</div></div></div></div>
                                </label>
                                <label for="car-details__year" class="col-sm-6 col-12 banner__form_field">
                                    <select class="select-list select-list__default select-list__car-details" name="mileageTo" id="car-details__kilometrage-from-to" tabindex="-1" style="display: none;" data-ssid="ss-11288">
                                        <option value="" disabled="" selected="" hidden="">Пробіг до</option>
                                        <option value="1000">1000</option>
                                        <option value="10000">10000</option>
                                        <option value="100000">100000</option>
                                        <option value="150000">150000</option>
                                        <option value="200000">200000</option>
                                        <option value="250000">250000</option>
                                        <option value="300000">300000</option>
                                        <option value="400000">400000</option>
                                        <option value="50000">50000</option>
                                        <option value="500000">500000</option></select><div class="ss-11288 ss-main select-list select-list__default select-list__car-details" style=""><div class="ss-single-selected"><span class="placeholder">Пробіг до</span><span class="ss-deselect ss-hide">x</span><span class="ss-arrow"><span class="arrow-down"></span></span></div><div class="ss-content"><div class="ss-search ss-hide"><input readonly="" type="search" placeholder="Search" tabindex="0" aria-label="Search"></div><div class="ss-list"><div class="ss-option ss-disabled ss-option-selected" data-id="5742479">Пробіг до</div><div class="ss-option" data-id="77185807">1000</div><div class="ss-option" data-id="73539584">10000</div><div class="ss-option" data-id="92758793">100000</div><div class="ss-option" data-id="27155149">150000</div><div class="ss-option" data-id="51152112">200000</div><div class="ss-option" data-id="1441237">250000</div><div class="ss-option" data-id="49532437">300000</div><div class="ss-option" data-id="66315052">400000</div><div class="ss-option" data-id="43949051">50000</div><div class="ss-option" data-id="6038842">500000</div></div></div></div>
                                </label>
                                <label for="car-details__year" class="col-sm-6 col-12 banner__form_field">
                                    <select class="select-list select-list__default select-list__car-details" name="yearFrom" id="car-details__year-from" tabindex="-1" style="display: none;" data-ssid="ss-83200">
                                        <option value="" disabled="" selected="" hidden="">Рік від</option>
                                        <option value="2000">2000</option>
                                        <option value="2001">2001</option>
                                        <option value="2002">2002</option>
                                        <option value="2003">2003</option>
                                        <option value="2004">2004</option>
                                        <option value="2005">2005</option>
                                        <option value="2006">2006</option>
                                        <option value="2007">2007</option>
                                        <option value="2008">2008</option>
                                        <option value="2009">2009</option>
                                        <option value="2010">2010</option>
                                        <option value="2011">2011</option>
                                        <option value="2012">2012</option>
                                        <option value="2013">2013</option>
                                        <option value="2014">2014</option>
                                        <option value="2015">2015</option>
                                        <option value="2016">2016</option>
                                        <option value="2017">2017</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                    </select><div class="ss-83200 ss-main select-list select-list__default select-list__car-details" style=""><div class="ss-single-selected"><span class="placeholder">Рік від</span><span class="ss-deselect ss-hide">x</span><span class="ss-arrow"><span class="arrow-down"></span></span></div><div class="ss-content"><div class="ss-search ss-hide"><input readonly="" type="search" placeholder="Search" tabindex="0" aria-label="Search"></div><div class="ss-list"><div class="ss-option ss-disabled ss-option-selected" data-id="33382422">Рік від</div><div class="ss-option" data-id="12979729">2000</div><div class="ss-option" data-id="47345257">2001</div><div class="ss-option" data-id="74827777">2002</div><div class="ss-option" data-id="5313930">2003</div><div class="ss-option" data-id="27713536">2004</div><div class="ss-option" data-id="33234561">2005</div><div class="ss-option" data-id="39217549">2006</div><div class="ss-option" data-id="8937503">2007</div><div class="ss-option" data-id="53214192">2008</div><div class="ss-option" data-id="44421862">2009</div><div class="ss-option" data-id="23995313">2010</div><div class="ss-option" data-id="19043999">2011</div><div class="ss-option" data-id="64944466">2012</div><div class="ss-option" data-id="10000950">2013</div><div class="ss-option" data-id="10309870">2014</div><div class="ss-option" data-id="4121387">2015</div><div class="ss-option" data-id="18525210">2016</div><div class="ss-option" data-id="23734165">2017</div><div class="ss-option" data-id="26267579">2018</div><div class="ss-option" data-id="22219077">2019</div><div class="ss-option" data-id="79862984">2020</div></div></div></div>
                                </label>
                                <label for="car-details__year" class="col-sm-6 col-12 banner__form_field">
                                    <select class="select-list select-list__default select-list__car-details" name="yearTo" id="car-details__year-to" tabindex="-1" style="display: none;" data-ssid="ss-91190">
                                        <option value="" disabled="" selected="" hidden="">Рік до</option>
                                        <option value="2000">2000</option>
                                        <option value="2001">2001</option>
                                        <option value="2002">2002</option>
                                        <option value="2003">2003</option>
                                        <option value="2004">2004</option>
                                        <option value="2005">2005</option>
                                        <option value="2006">2006</option>
                                        <option value="2007">2007</option>
                                        <option value="2008">2008</option>
                                        <option value="2009">2009</option>
                                        <option value="2010">2010</option>
                                        <option value="2011">2011</option>
                                        <option value="2012">2012</option>
                                        <option value="2013">2013</option>
                                        <option value="2014">2014</option>
                                        <option value="2015">2015</option>
                                        <option value="2016">2016</option>
                                        <option value="2017">2017</option>
                                        <option value="2018">2018</option>
                                        <option value="2019">2019</option>
                                        <option value="2020">2020</option>
                                    </select><div class="ss-91190 ss-main select-list select-list__default select-list__car-details" style=""><div class="ss-single-selected"><span class="placeholder">Рік до</span><span class="ss-deselect ss-hide">x</span><span class="ss-arrow"><span class="arrow-down"></span></span></div><div class="ss-content"><div class="ss-search ss-hide"><input readonly="" type="search" placeholder="Search" tabindex="0" aria-label="Search"></div><div class="ss-list"><div class="ss-option ss-disabled ss-option-selected" data-id="32156389">Рік до</div><div class="ss-option" data-id="36107944">2000</div><div class="ss-option" data-id="83929775">2001</div><div class="ss-option" data-id="60543454">2002</div><div class="ss-option" data-id="3634646">2003</div><div class="ss-option" data-id="8751720">2004</div><div class="ss-option" data-id="78553984">2005</div><div class="ss-option" data-id="80670941">2006</div><div class="ss-option" data-id="10450817">2007</div><div class="ss-option" data-id="3214536">2008</div><div class="ss-option" data-id="88597714">2009</div><div class="ss-option" data-id="16710397">2010</div><div class="ss-option" data-id="83748246">2011</div><div class="ss-option" data-id="45715040">2012</div><div class="ss-option" data-id="16005272">2013</div><div class="ss-option" data-id="87018627">2014</div><div class="ss-option" data-id="16116987">2015</div><div class="ss-option" data-id="11724804">2016</div><div class="ss-option" data-id="92041097">2017</div><div class="ss-option" data-id="22671959">2018</div><div class="ss-option" data-id="225255">2019</div><div class="ss-option" data-id="39346103">2020</div></div></div></div>
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
                        <img class="car-article_car-photo" src="{{ asset('/images/' . $car->mainImage['name']) }}" alt="car">
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
                                <p>{{ $car->engine }}</p>
                                <p>{{ $car->distance }} км</p>
                                <p>{{ $car->gear }}</p>
                                <p>{{ $car->fuel }}</p>
                            </div>
                            <div class="spec_button">
                                <a href="{{ $car->url }}" class="button_watch-list">Перейти на сайт</a>
                                <a class="button_more-info">Переглянути</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endforeach
    </article>
@endsection
