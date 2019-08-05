<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RefreshRoomStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
 
CREATE  EVENT `Refresh_Room_Status`

ON SCHEDULE
       EVERY 1 MINUTE
DO
    BEGIN
    
    UPDATE rooms 
JOIN(SELECT * FROM booklists WHERE booklists.`waktu_Pinjam_Mulai` + INTERVAL 10 MINUTE < NOW()) AS blist
ON rooms.`id` = blist.`id_Ruangan`
SET rooms.`status_now` = "FREE"
WHERE rooms.`status_now` = "WAITING";


    /*DELETE bk.*
FROM booklists AS bk
JOIN rooms AS rm
ON rm.id = bk.id_Ruangan
WHERE rm.`status_now` = "WAITING" AND bk.`waktu_Pinjam_Mulai` + INTERVAL 10 MINUTE < NOW();*/

        UPDATE rooms 
JOIN(SELECT * FROM booklists WHERE booklists.`waktu_Pinjam_Mulai` <= NOW() AND booklists.`waktu_Pinjam_Mulai` + INTERVAL 10 MINUTE >= NOW() ) AS blist
ON rooms.`id` = blist.`id_Ruangan`
SET rooms.`status_now` = "WAITING"
WHERE rooms.`status_now` != "BOOKED";

UPDATE rooms 
JOIN(SELECT * FROM booklists WHERE booklists.`waktu_Pinjam_Mulai` >= NOW() AND booklists.`waktu_Pinjam_selesai` >= NOW() OR 
booklists.`waktu_Pinjam_Mulai` <= NOW() AND booklists.`waktu_Pinjam_selesai` <= NOW()) AS blist
ON rooms.`id` = blist.`id_Ruangan`
SET rooms.`status_now` = "FREE";
    END
;

            ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

        DB::unprepared('DROP EVENT Refresh_Room_Status');
        //
    }
}
