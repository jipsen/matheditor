MathEditor
==========

This project aims to extend the excellent 
[MathQuill](https://github.com/mathquill/mathquill) script to an online
math editor that can be used to conveniently type math homework and research
papers. The present version is based on the MathQuill textbox and is already
usable, though there are several issues that need to be addressed.

How does it differ from the original MathQuill textbox:

- "Enter" works in the text sections
- Some tweaks by David Lippman make MathQuill work for iOS and Android
- Adjustments of CSS, e.g. make the scriptsize a bit smaller (80%)

To do:

- Enable cursor up/down movement in text
- Get backspace working in Android
- Fix copy/paste, especially with formulas
- Make editing on smartphones and tablets convenient

Would be nice:

- Undo/redo
- Displayed (i.e. centered) math formulas
- Piecewise defined function notation
- Accept ASCIIMath notation (convert to LaTeX)
- Add arithmetic evaluator
- Allow definition of constants and functions
- Include simple math checker
- Add some symbolic one-step operations (pick result from a list)

Probably it would be better to use only the MathQuill formula editor from within a contenteditable &lt;div>. That way the text editing is handled by the browser and only the formula editing/display is done by MathQuill. When the cursor enters a MathQuill box, an event handler will call the appropriate MathQuill code.
