import FingerprintJS from "@fingerprintjs/fingerprintjs";
import { setLS, getLS } from "./libs/local-storage";

if (!getLS("visitorId")) {
    (async () => {
        const fp = await FingerprintJS.load();
        const { visitorId } = await fp.get();
        setLS("visitorId", visitorId);
    })();
}
