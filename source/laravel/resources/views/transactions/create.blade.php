@extends('layouts.main')

@section('title', 'Создание перевода')

@section('content')

    <div class="row">
        <div class="col-lg-12">

            <div class="b-form">

                <form action="{{route('transaction-store')}}" method="post">

                    {!! csrf_field() !!}

                    <div class="form-group">
                        <label for="">Кому (ID пользователя)</label>
                        <input name="Transaction[to_user]" value="{{old('Transaction.to_user')}}" type="text" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="">Когда</label>
                        <input name="Transaction[datetime]" value="{{old('Transaction.datetime')}}" type="text" class="form-control js-datepicker">
                    </div>

                    <div class="form-group">
                        <label for="">Сколько</label>
                        <input name="Transaction[amount]" value="{{old('Transaction.amount')}}" type="text" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Отправить</button>

                </form>

            </div>

        </div>
    </div>


@stop
