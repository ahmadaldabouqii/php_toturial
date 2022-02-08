<?php

// Magic Constants
echo __DIR__ . '<br>';
echo __FILE__ . '<br>';
echo __LINE__ . '<br>';

# Create directory
mkdir('./fileSystem/test1');

// Rename Directory

rename('./fileSystem/test1', 'test2');

// Remove Directory
rmdir('/test2');