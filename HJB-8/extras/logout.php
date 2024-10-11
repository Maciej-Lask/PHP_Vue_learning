<?php
session_start();

session_destroy();
header('Location: /HJB-8/Lesson13-sessions.php');
