<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class InitalTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->timestamps();
        });

        $studentRole = new App\roles;
        $studentRole->name = 'student';
        $studentRole->save();

        $instructorRole = new App\roles;
        $instructorRole->name = 'instructor';
        $instructorRole->save();

        $adminRole = new App\roles;
        $adminRole->name = 'admin';
        $adminRole->save();



/* Seeding*/
        $superAdmin = new App\User;
        $superAdmin->name = 'Matt H';
        $superAdmin->email = 'admin@linguacircle.com';
        $superAdmin->role_id = 3;
        $superAdmin->password = Hash::make('qwe');
        $superAdmin->save();

        $teacher = new App\User;
        $teacher->name = 'Teacher Name';
        $teacher->email = 'teacher@linguacircle.com';
        $teacher->role_id = 2;
        $teacher->password = Hash::make('qwe');
        $teacher->save();

        $teacher = new App\User;
        $teacher->name = 'Student Name';
        $teacher->email = 'student@linguacircle.com';
        $teacher->role_id = 1;
        $teacher->password = Hash::make('qwe');
        $teacher->save();
/*   /seeding   */

        Schema::create('subjects', function (Blueprint $t) {
            $t->increments('id');
            $t->string('name');
            $t->timestamps();
        });

        $mathsSubject = new App\subject;
        $mathsSubject->name = 'Maths';
        $mathsSubject->save();


        Schema::create('sessions', function (Blueprint $tbl) {
            $tbl->increments('id');
            $tbl->integer('subject_id');
            $tbl->string('topic');
            $tbl->integer('instructor_id');
            $tbl->integer('start');
            $tbl->integer('finish');
            $tbl->timestamps();
        });

        $testSession = new App\session;
        $testSession->subject_id = 1;
        $testSession->topic = 'Second order differential equations';
        $testSession->start = strtotime('2018-03-11 10:00');
        $testSession->finish = strtotime('2018-03-11 11:00');
        $testSession->instructor_id = 2;
        $testSession->save();


        Schema::create('bookings', function (Blueprint $tbl) {
            $tbl->increments('id');
            $tbl->integer('session_id');
            $tbl->integer('student_id');
            $tbl->timestamps();
        });

        $booking = new App\booking;
        $booking->session_id = 1;
        $booking->student_id = 3;
        $booking->save();


        Schema::create('notifs', function (Blueprint $a) {
            $a->increments('id');
            $a->integer('user_id');            
            $a->string('content');
            $a->string('callback')->default('noCallback');
            $a->boolean('unread')->default(1);
            $a->integer('target')->default(0);
            $a->timestamps();
        });        

        $testNotification = new App\notif;
        $testNotification->user_id = 3;
        $testNotification->content = 'demonstration notification';
        $testNotification->save();

        Schema::create('conversations', function (Blueprint $b) {
            $b->increments('id');
            $b->timestamps();
        });  

        $testConversation = new App\conversation;
        $testConversation->save();

        Schema::create('messages', function (Blueprint $c) {
            $c->increments('id');
            $c->integer('conversation_id');
            $c->integer('sender_id');
            $c->string('message');
            $c->timestamps();
        });  

        $testMessage = new App\message;
        $testMessage->conversation_id = $testConversation->id;
        $testMessage->sender_id = 2;
        $testMessage->message = 'Hi, I hope you are ready for your upcoming lesson';
        $testMessage->save();

        Schema::create('conversation_users', function (Blueprint $d) {
            $d->increments('id');
            $d->integer('user_id');
            $d->integer('conversation_id');
            $d->boolean('unread');
            $d->timestamps();
        });  

        $convUserStudent = new App\conversation_user;
        $convUserStudent->user_id = 3;
        $convUserStudent->unread = 1;
        $convUserStudent->conversation_id = $testConversation->id;
        $convUserStudent->save();

        $convUserTeacher = new App\conversation_user;
        $convUserTeacher->user_id = 2;
        $convUserTeacher->unread = 1;
        $convUserTeacher->conversation_id = $testConversation->id;
        $convUserTeacher->save();
      



    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
        Schema::dropIfExists('subjects');
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('bookings');
        Schema::dropIfExists('notifs');       
        Schema::dropIfExists('conversations');       
        Schema::dropIfExists('messages');       
        Schema::dropIfExists('conversation_users');                                
    }
}
