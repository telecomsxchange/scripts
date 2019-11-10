#!/bin/bash
  
  tail -10000 /var/log/sip.log| grep AAA| grep elay| grep -v 'delay is 0' > /tmp/monitor_delays.tmp
  lines=`wc -l /tmp/monitor_delays.tmp | awk {'print $1'}`
  
  MYHOST=`hostname`
 
 if [ "$lines" != "0" ] ; then
    echo  "send monitoring email $lines"
    mail -s "AAA delays detected on $MYHOST" admin_email@domain.com ,admin_cc@domain.com </tmp/monitor_delays.tmp
  fi
