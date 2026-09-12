# Privacy Policy

**Last updated:** 12 September 2026 — added the "Google API Limited Use compliance" section below for Google's OAuth verification requirements. Not yet pasted into the live Divi page — see the flag at the bottom of this file.

LIP Services ("we", "us", "our", ABN 96 976 308 814) provides AI-powered marketing and business automation for Australian service businesses. This policy explains what personal information we collect, why, and what your rights are. It applies to visitors to lipservices.com.au, leads who contact us, and clients using our CRM, voice, and messaging services.

## What we collect

Depending on how you interact with us, we may collect:

- "Contact details" — name, email address, phone number
- "Business details" — business type, the problem you're trying to solve ("pain point")
- "Conversation data" — messages you send our website chat agent (Aria), SMS conversations, or call recordings/transcripts if you use a client's AI voice agent
- "Enquiry source" — which page, ad, or channel you came from
- "Payment information" — if you become a client, handled directly by our payment processor (Stripe); we don't store card details ourselves

We collect this when you fill in a form on our site, message Aria, call or text a number connected to our system, or sign up as a client.

## Why we collect it

- To respond to enquiries and follow up on leads
- To provide the services you've signed up for (CRM, voice agent, automated follow-up, content)
- To send you marketing communications, if you haven't opted out
- To meet our legal and accounting obligations

## Who we share it with

We use the following service providers to run our systems. Your information may pass through their infrastructure as part of normal operation:

- **Supabase**: database hosting for our CRM
- **Vercel**: website and application hosting
- **Telnyx**: voice and SMS delivery (each client's number and call/message data sits under that client's own Telnyx account)
- **ElevenLabs**: AI voice generation for the voice agent
- **Anthropic (Claude API)**: processes conversation and lead data to power Aria and lead extraction
- **Stripe**: payment processing
- **Resend**: transactional and newsletter email delivery for LIP Services' own communications; client campaign email, where used, runs through that client's own Resend account [ASSUMPTION: confirm this is live before publishing — brain.txt notes it's pending a plan upgrade]

We don't sell your personal information. We don't share it with anyone outside this list except where required by law.

## Overseas disclosure

Several of the providers listed above are based overseas, primarily in the United States. This means your personal information may be handled or stored outside Australia as part of normal service delivery. We only work with providers that maintain their own security and privacy commitments, and we take reasonable steps to ensure your information is handled consistently with the Australian Privacy Principles even when it's processed offshore.

## How long we keep it

We keep contact and lead data for as long as you're engaging with us, and delete it after 18 months of inactivity if you haven't become a client. If you've been a client and your subscription ends, we keep your CRM and conversation data for 60 days in case you reactivate, then delete it.

This doesn't apply to financial and transaction records (invoices, payment records), which we're required to keep for 5 years under Australian tax law regardless of activity status.

You can ask us to delete your data sooner at any time (see below).

## Your rights

Under the Australian Privacy Principles, you can:

- Ask what personal information we hold about you
- Ask us for a copy of it
- Ask us to correct it if it's wrong
- Ask us to delete it
- Opt out of marketing at any time: every email has an unsubscribe link, and you can text STOP to any of our SMS numbers

To make a request, contact us using the details below. We'll respond within a reasonable timeframe, generally within 30 days.

## Google API Limited Use compliance

LIPS CRM connects to Google Calendar, with your explicit permission, to check availability and create booking events on the calendar you connect. This use is subject to the [Google API Services User Data Policy](https://developers.google.com/terms/api-services-user-data-policy), including the Limited Use requirements:

- Google Calendar data is used only to check free/busy times and create, update, or cancel booking events on the connected calendar — for no other purpose.
- We do not use data from Google Workspace APIs — raw, aggregated, or derived — to develop, train, or improve any AI/ML model, foundational or otherwise. LIP Services CRM also uses the Anthropic Claude API elsewhere (for lead handling and content), but that feature never receives or processes Google Calendar data — the two are fully separate.
- We do not sell, rent, or transfer Google Workspace user data to any third party, including for advertising.
- Google Calendar access can be revoked at any time from your Google Account permissions (myaccount.google.com/permissions).

*"The use of raw or derived user data received from Workspace APIs will adhere to the Google User Data Policy, including the Limited Use requirements."*

## Security

We take reasonable steps to protect your information, including access controls on our CRM and encrypted connections between our systems. No system is completely secure, and we can't guarantee absolute security of information transmitted to us.

## Changes to this policy

We may update this policy as our services change. The "last updated" date at the top will reflect the most recent version.

## Contact us

**LIP Services**
Phone: 0422 717 798
Email: [see website contact form]
ABN: 96 976 308 814

---
*[ASSUMPTION FLAGGED FOR ROBERT: Resend status still needs confirming before this goes live (retention period is now settled — 18 months inactivity for leads, 60 days post-cancellation for former clients, 5 years for financial records per ATO). The "Overseas disclosure" section was added for APP 8 compliance since the policy invokes the Australian Privacy Principles by name — worth a quick once-over. Everything else is drawn directly from brain.txt's documented stack and data flows.]*

*[FLAGGED FOR ROBERT, 2026-09-12: the new "Google API Limited Use compliance" section above is required by Google's OAuth verification team (rejection reason #2 on the lip-services-crm submission) and must be live at lipservices.com.au/privacy/ before you resubmit — it's not optional wording, it's a checked requirement. Paste the whole updated file into the Divi page that currently serves /privacy/. See `LIPS-CRM/docs/google-oauth-verification-resubmission.md` for the full resubmission checklist (video re-record, scope check, test credentials).]*
