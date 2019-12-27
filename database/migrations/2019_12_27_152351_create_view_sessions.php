<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViewSessions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (config('database.default') == 'mysql') {
            DB::unprepared("");
        }elseif((config('database.default') == 'sqlsrv')) {
            DB::unprepared("
            CREATE VIEW v_sessions AS SELECT 
            last_activity,
            DATEADD(s, t1.last_activity , '19700101') as last_activity_datetime,
            CONVERT(date,DATEADD(s, t1.last_activity , '19700101'),106) as last_activity_date,
            DATEADD(s, t1.last_activity - DATEDIFF(s, GETDATE(), GETUTCDATE()), '19700101') as session_datetime_local,
            CONVERT(date,DATEADD(s, t1.last_activity - DATEDIFF(s, GETDATE(), GETUTCDATE()) , '19700101'),106) as session_date_local,
            t1.ip_address,
            t2.id as user_id,
            t2.username, t2.email,
            t3.role_id,
            t4.rolename   
            FROM t_sessions t1 
            LEFT JOIN t_users t2 ON t1.user_id=t2.id 
            LEFT JOIN t_role_user t3 ON t2.id=t3.user_id 
            LEFT JOIN t_roles t4 ON t3.role_id=t4.id 
            WHERE CONVERT(date,DATEADD(s, t1.last_activity , '19700101'),106) = CONVERT(date,GETDATE(),106)
            ");
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared("DROP VIEW v_sessions");
    }
}
