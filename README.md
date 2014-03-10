MathEditor
==========

This project aims to extend the excellent 
[MathQuill](https://github.com/mathquill/mathquill) script to an online
math editor that can be used to conveniently type math homework and research
papers. The present version is based on the MathQuill textbox and is already
usable, though there are several issues that need to be addressed.

See http://math.chapman.edu/~jipsen/matheditor/ for a demo version (enter "testing" as Key to enable saving).

How does it differ from the original MathQuill textbox:

- "Enter" works in the text sections
- Some tweaks by David Lippman make MathQuill work for iOS and Android
- Adjustments of CSS, e.g. make the scriptsize a bit smaller (80%)

To do:

- Enable cursor up/down movement in text
- Get backspace working in Android
- Fix copy/paste, especially with formulas
- Make editing on smartphones and tablets convenient (e.g. prevent scrolling to top of textbox)

Would be nice:

- Undo/redo
- Displayed (i.e. centered) math formulas
- Piecewise defined function notation
- Accept ASCIIMath notation (convert to LaTeX)
- Add arithmetic evaluator
- Allow definition of constants and functions
- Include simple math checker
- Add some symbolic one-step operations (pick result from a list)

Probably it would be better to use only the MathQuill formula editor from within a contenteditable &lt;div>. That way the text editing is handled by the browser and only the formula editing/display is done by MathQuill. When the cursor enters a MathQuill box, an event handler will call the appropriate MathQuill code. However this will require some complex interactions between the MathQuill editor and the browser editor, and it seems to be nontrivial to get something like this working in many different browsers. So for now the plan is to extend the MathQuill formula editor into a usable text editor that works on computers, tablets and (most) smartphones.

The current setup:
------------------

index.php is the basic file for the editor. It contains some php and js code to load and save content of the MathQuill textboxes. A very basic login script is included.

editor.css is copied from mathquill/test/support/home.css with a few lines added or modified.

mq1.tex, mq2.tex, ... are the contents of the MathQuill textboxes. They have to be writable by the php process.

save.php is used by the jquery ajax method to save the textboxes

mathquill.js and mathquill.css are copies of the MathQuill files. They have been modified with some tweaks by David Lippman and some other conveniences. E.g. many LaTeX commands can be typed without the preceeding backslash.

Symbola.otf is a copy of one of the files from the mathquill/font folder (seems to be the most useful one).

With this setup it is possible to write a textbook with MathQuill and leave space for notes and solutions to exercises. Students can then read their copy of the book online, make notes and type solutions to the exercises. Php scripts can be used to combine the solutions into a single HTML file for grading or to share (anonymously) with all students. (Such scripts have been developed for a MathJax version, but they have not yet been ported to work with MathQuill)

## Open-Source License

[GNU Lesser General Public License](http://www.gnu.org/licenses/lgpl.html)

Copyleft 2014 [Peter](http://github.com/jipsen)

MathQuill Copyleft 2010-2014 by [Han](http://github.com/laughinghan) and [Jay](http://github.com/jayferd)
