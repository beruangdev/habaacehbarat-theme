import { getLS, setLS } from './libs/helpers/local-storage'

// import FingerprintJS from "@fingerprintjs/fingerprintjs";
if (!getLS("visitorId")) {
    (async () => {
        const visitorId = randomStr(40) + "-" + Date.now();
        // const fp = await FingerprintJS.load();
        // const { visitorId } = await fp.get();
        setLS("visitorId", visitorId);
    })();
}
