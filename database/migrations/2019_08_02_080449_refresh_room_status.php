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

DROP EVENT IF EXISTS Refresh_Room_Status;
CREATE  EVENT `Refresh_Room_Status`

ON SCHEDULE
       EVERY 1 MINUTE STARTS "2019-08-06 14:26:00" 
DO
    BEGIN

UPDATE rooms r JOIN booklists b ON (r.id =  b.id_ruangan) 
SET r.status_now = "WAITING", b.status = "NEED CONFIRMATION" 
WHERE (b.`waktu_Pinjam_Mulai` <= NOW() AND b.status = "WAITING");

UPDATE rooms r JOIN booklists b ON (r.id =  b.id_ruangan) 
SET r.status_now = "FREE", b.status = "CANCELLED"
WHERE (b.`waktu_Pinjam_Mulai` + INTERVAL 10 MINUTE <= NOW() AND b.status = "NEED CONFIRMATION");

UPDATE rooms r JOIN booklists b ON (r.id =  b.id_ruangan) 
SET r.status_now = "FREE", b.status = "DONE"
WHERE (b.`waktu_Pinjam_Selesai` <= NOW() AND b.status = "IN PROGRESS" );

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

        DB::unprepared('DROP EVENT IF EXISTS Refresh_Room_Status');
        //
    }
}
