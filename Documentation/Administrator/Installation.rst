.. include:: /Includes.rst.txt

.. _installation:

Installation
===

Install this extension via Composer::

    composer require traw/powermail-salesforce

Alternatively, add it to your project's ``composer.json`` file::

    "require": {
        "typo3/cms-core": "^12 || ^13",
        "traw/powermail-salesforce": "^1.0"
    }

If the package ``evoweb/extender`` is installed (for example as a dependency of another extension),
this extension will automatically use its mechanisms to extend the Form and Field models.
No additional configuration is required.


.. _recommended-extensions:

Recommended Extensions
===

This extension can work together with other extensions that extend Powermail.
Below is a list of extensions that I always install when using :t3ext:`powermail`  where ``powermail-salesforce``
will automatically contribute its functionality:

- :t3ext:`powermailcaptcha`
    Captcha Extension for TYPO3 powermail to prevent spam
    https://extensions.typo3.org/extension/powermailcaptcha

- :t3ext:`powermailautocomplete`
    Add autocomplete options to powermail fields.
    https://extensions.typo3.org/extension/powermailautocomplete

- :t3ext:`powermail_cond`
    Add conditions (via AJAX) to powermail forms for fields and pages
    https://extensions.typo3.org/extension/powermail_cond

