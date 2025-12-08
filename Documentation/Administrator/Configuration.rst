.. _configuration:

Configuration
===

After installation, make sure to include the extension's Site-Set or Typoscript Template.

If you don't need to enable the debug mode, no further configuration is necessary.


.. note::
    Make sure WebToLead is enabled in Production and Sandbox (if you want to use Debug mode)

    `Salesforce WebToLead Documentation <https://help.salesforce.com/s/articleView?id=sales.setting_up_web-to-lead.htm&type=5>`_

.. important::
    Your form must accept the **lead_source** value ``Web-to-Lead``

    If you wish to allow single Opt-in, it must accept the value ``Single-Opt-in`` as well

    `How to add a Lead Source <https://help.salesforce.com/s/articleView?id=000384450&type=1>`_
