// src/components/site/FooterServer.tsx  (server wrapper)
import { getFooter, type Locale } from "@/lib/cms";
import Footer from "./Footer";

export default async function FooterServer({ locale }: { locale: Locale }) {
    const data = await getFooter(locale);
    return <Footer data={data} />;
}
