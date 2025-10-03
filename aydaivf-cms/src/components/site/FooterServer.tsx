// src/components/site/FooterServer.tsx
import { getFooter } from "@/lib/cms";
import Footer from "./Footer";

export default async function FooterServer({ locale }: { locale: "tr" | "en" }) {
    const data = await getFooter(locale);
    return <Footer data={data} />;
}
