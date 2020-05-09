<?php

// Checks for free-standing capital letters A B C , not AB or Ab or aB:
preg_match('/\b[A-Z]\b/', $checkStr, $matchResult);
