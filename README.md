#var_debug

This project is a tiny helper function for helping vars debugging in PHP.

You may ask why, coz print_r and var_dump could also do the job.

The answer is quite simple :

* a `print_r` does not provide all typing informations and is hard to read in html mode
* a `var_dump` provides more informations, but all objects informations are expanded and becomes hard to read (eg: references of objects)

# Functionnalities

* Same as var_dump, shows all typing informations
* Intensive use of CSS classnames, so you can customize the presentation (if you want to)
* No framework or what ever intrusive use of CSS, JS & jQuery (automatically inlined)
* Customize the nesting level depending of what you expect
* Easy expand/collapse details by clicking on classes names or array sizes

# Preview of test.php

![var_debug preview](https://raw.github.com/ichiriac/var_debug/master/preview.png)

## MIT License

Copyright (C) <2012> <PHP Hacks Team : http://coderwall.com/team/php-hacks>

Permission is hereby granted, free of charge, to any person obtaining a copy of 
this software and associated documentation files (the "Software"), to deal in 
the Software without restriction, including without limitation the rights to 
use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of
 the Software, and to permit persons to whom the Software is furnished to do so, 
subject to the following conditions:

The above copyright notice and this permission notice shall be included in all 
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR 
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS 
FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR 
COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER 
IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN 
CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
