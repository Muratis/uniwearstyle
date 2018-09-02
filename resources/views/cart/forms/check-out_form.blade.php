<div  id="form">
    <div class="names">
        <div class="col-xs-6"><input type="text" name="first_name" class="form-control" placeholder="Им`я" value="{{old('first_name')}}"></div>
        <div class="col-xs-6"><input type="text" name="last_name" class="form-control" placeholder="Прізвище" value="{{old('last_name')}}"></div>
    </div>


        @if ($errors->first('first_name'))

            <div class="alert alert-danger error" >
                <ul>
                    <li>{{ $errors->first('first_name') }}</li>
                </ul>
            </div>

        @endif
        @if ($errors->first('last_name'))


            <div class="alert alert-danger error">
                <ul>
                    <li>{{ $errors->first('last_name') }}</li>
                </ul>
            </div>

        @endif

    <div>
        <label for="shipping">Вибрати спосіб доставки</label>
        <select class="form-control" name="shipping" id="method" value="{{old('shipping')}}" >
            <option value="new-post" name="new-post" id="new-post">Відправка "Нова пошта"</option>
            <option value="address" name="address" id="address">Доставка за адресою</option>
        </select>
    </div>
    <div id="content">
        <div class="col-xs-5 ship_to_addres"><input type="text" name="city" class="form-control" placeholder="Місто"></div>
        <div class="col-xs-5 ship_to_addres"><input type="text" name="address_ship" class="form-control" placeholder="Адреса"></div>
        <div class=" ship_to_addres"><input type="text" name="phone" class="form-control" placeholder="Номер телефону"></div>


        <div class="col-xs-5 ship_to_nv"><input type="text" name="city"  id="city" class="form-control" placeholder="Місто" value="{{old('city')}}"></div>
        <div class="col-xs-5 ship_to_nv" id="warehouses">
          <select id="npCities" name="address_ship">

          </select>
        </div>
        <div class=" ship_to_nv"><input type="text" name="phone" class="form-control" placeholder="Номер телефону" value="{{old('phone')}}"></div>

    </div>
    @if ($errors->first('city'))

        <div class="alert alert-danger error">
            <ul>
                <li>{{ $errors->first('city') }}</li>
            </ul>
        </div>

    @endif

    @if ($errors->first('address_ship'))


        <div class="alert alert-danger error">
            <ul>
                <li>{{ $errors->first('address_ship') }}</li>
            </ul>
        </div>

    @endif

    @if ($errors->first('phone'))

        <div class="alert alert-danger error">
            <ul>
                <li>{{ $errors->first('phone') }}</li>
            </ul>
        </div>

    @endif

</div>

{{csrf_field()}}
<input type="hidden" name="id" value="{{rand()}}">
<input type="submit" class="btn btn-success" value="Відправити">