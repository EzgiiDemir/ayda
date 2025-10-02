// src/app/[locale]/tedaviler/yumurtadonasyonu/page.tsx
import { Locale, getTreatment } from "@/lib/cms";
import TreatmentDetail from "@/components/ui/TreatmentDetail";

export default async function Page({ params }: { params: { locale: Locale } }) {
    const data = await getTreatment(params.locale, "tedaviler/yumurtadonasyonu");
    return <TreatmentDetail data={data} />;
}
