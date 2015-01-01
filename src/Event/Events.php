<?php

namespace Event;

final class Events
{
    // types of events
    const JOB = "job";
    const MAIL = "mail";

    // event methods
    const JOB_QUEUE = "job.queue";
    const MAIL_LISTMAILBOXES = "mail.listmailboxes";
}