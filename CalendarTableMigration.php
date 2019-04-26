<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CalendarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calendar_table', function (Blueprint $table) {
            $table->date('dt')->primary();
            $table->smallInteger('year')->nullable();
            $table->tinyInteger('quarter')->nullable();
            $table->tinyInteger('month')->nullable();
            $table->tinyInteger('day')->nullable();
            $table->tinyInteger('day_of_week')->nullable();
            $table->string('month_name', 9)->nullable();
            $table->string('day_name', 9)->nullable();
            $table->tinyInteger('week')->nullable();
            $table->boolean('is_weekday')->default(1)->nullable();
            $table->boolean('is_holiday')->default(1)->nullable();

        });

        Schema::create('ints', function (Blueprint $table) {
            $table->tinyInteger('i');
        });

        DB::table('ints')->insert([
            ['i'=>0],
            ['i'=>1],
            ['i'=>2],
            ['i'=>3],
            ['i'=>4],
            ['i'=>5],
            ['i'=>6],
            ['i'=>7],
            ['i'=>8],
            ['i'=>9],
        ]);

        DB::insert(
            "insert into calendar_table (dt) 
             (
             select STR_TO_DATE('1969-01-01', '%Y-%m-%d') + interval a.i*10000 + b.i*1000 + c.i*100 + d.i*10 + e.i day 
             from ints a 
             join ints b 
             join ints c 
             join ints d 
             join ints e 
             where (a.i*10000 + b.i*1000 + c.i*100 + d.i*10 + e.i) <= 26000 
             order by 1
             )"
        );

        DB::table('calendar_table')->update([
            'is_weekday'=>DB::raw('case when dayofweek(dt) in (1,7) then 0 else 1 end'),
            'is_holiday'=>0,
            'year'=>DB::raw('year(dt)'),
            'quarter'=>DB::raw('quarter(dt)'),
            'month'=>DB::raw('month(dt)'),
            'day'=>DB::raw('dayofmonth(dt)'),
            'day_of_week'=>DB::raw('dayofweek(dt)'),
            'month_name'=>DB::raw('monthname(dt)'),
            'day_name'=>DB::raw('dayname(dt)'),
            'week'=>DB::raw('week(dt)'),
        ]);

        Schema::dropIfExists('ints');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calendar_table');
    }
}
