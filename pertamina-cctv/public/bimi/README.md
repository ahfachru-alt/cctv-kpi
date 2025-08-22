# BIMI Setup for Gmail Brand Logo

1) Assets
- SVG Logo (Tiny P/S): `https://yourdomain.id/bimi/pertamina.svg`
- VMC (Verified Mark Certificate): `https://yourdomain.id/bimi/vmc.pem`

2) DNS Records
- SPF (example):
  - yourdomain.id TXT: `v=spf1 include:_spf.google.com ~all`
- DKIM: enable at your mail provider; publish CNAME/TXT as instructed
- DMARC (enforced):
  - _dmarc.yourdomain.id TXT:
    - `v=DMARC1; p=quarantine; pct=100; rua=mailto:dmarc@yourdomain.id; ruf=mailto:dmarc-forensic@yourdomain.id; adkim=s; aspf=s; fo=1`
- BIMI:
  - default._bimi.yourdomain.id TXT:
    - `v=BIMI1; l=https://yourdomain.id/bimi/pertamina.svg; a=https://yourdomain.id/bimi/vmc.pem`

3) App Config
- .env
  - `MAIL_FROM_ADDRESS=no-reply@yourdomain.id`
  - `MAIL_FROM_NAME="KILANG PERTAMINA INTERNASIONAL"`

4) Verification
- Ensure SPF/DKIM/DMARC PASS in Gmail “Show original”
- Validate BIMI via a BIMI Inspector tool
- DNS propagation may take 24–72 hours

Notes:
- Gmail requires VMC for consistent avatar display
- From domain must align with SPF/DKIM/DMARC