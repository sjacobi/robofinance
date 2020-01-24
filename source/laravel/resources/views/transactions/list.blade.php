<?php

use App\Helpers\MoneyHelper;

?>
@extends('layouts.main')

@section('title', 'Список последних переводов')

@section('content')

    <div class="row">
        <div class="col-lg-12">

            <div class="b-list">

                <div class="b-list__block b-list__block--title">

                    <div class="b-list__cell col-1">

                        <div class="b-list__title">
                            Номер
                        </div>

                    </div>

                    <div class="b-list__cell col-3">

                        <div class="b-list__title">
                            От кого
                        </div>

                    </div>

                    <div class="b-list__cell col-3">

                        <div class="b-list__title">
                            Кому
                        </div>

                    </div>

                    <div class="b-list__cell col-3">

                        <div class="b-list__title">
                            Сумма
                        </div>

                    </div>

                    <div class="b-list__cell col-2">

                        <div class="b-list__title">
                            Дата создания
                        </div>

                    </div>


                </div>


            </div>


        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">

            <div class="b-list">

                @foreach ($lastUsersTransactionsArray as $row)

                    <div class="b-list__block">

                        <div class="b-list__cell col-1">

                            <div class="b-list__title">
                                ID{{$row->transaction_id}}
                            </div>

                        </div>

                        <div class="b-list__cell col-3">

                            <div class="b-list__title">
                                {{$row->from_user_name}}
                            </div>

                        </div>

                        <div class="b-list__cell col-3">

                            <div class="b-list__title">
                                {{$row->to_user_name}}
                            </div>

                        </div>

                        <div class="b-list__cell col-3">

                            <div class="b-list__title">
                                {{ MoneyHelper::decode($row->transaction_amount)}}
                            </div>

                        </div>

                        <div class="b-list__cell col-2">

                            <div class="b-list__title">
                                {{$row->transaction_created_at}}
                            </div>

                        </div>


                    </div>

                @endforeach

            </div>


        </div>
    </div>

@stop
